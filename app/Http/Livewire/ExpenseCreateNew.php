<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Expense;
use App\ExpenseCategory;
use App\ExpensePaymentType;
use App\ExpensePayment;
use App\ExpenseAdditionHeading;
use App\ExpenseItem;
use App\ExpenseAddition;

use App\Vendor;


class ExpenseCreateNew extends Component
{
    public $expense = null;

    /* Add item related */
    public $selectedProduct = null;
    public $expenseCategories;

    /* Make payment related */
    public $tender_amount;
    public $expensePaymentTypes;
    public $multiPayments = array();
    public $expense_payment_type_id;

    /* Expense item related */
    public $add_item_name;
    public $add_item_expense_category_id;
    public $add_item_amount;

    /* Total related */
    public $sub_total;
    public $expenseAdditions = array();
    public $taxable_amount;
    public $grand_total;

    /* VAT related */
    public $has_vat = false;

    /* Vendor related */
    public $vendors;
    public $vendor_id;

    public $item_count = 0;

    public $modes = [
        'multiplePayments' => false,
        'paid' => false,

        'vendorSelected' => false,
    ];

    public function mount()
    {
        $expense = new Expense;

        $this->vendors = Vendor::all();

        /* Todo: Below three should be dropped from database design. */
        $expense->name = 'TODO';
        $expense->amount = 1;
        $expense->expense_category_id = 1;

        $expense->date = date('Y-m-d');
        $expense->payment_status = 'pending';

        $expense->save();

        $this->expense = $expense;

        /* Zero fill expenseAdditions */
        foreach (ExpenseAdditionHeading::all() as $expenseAddition) {
            $this->expenseAdditions += [$expenseAddition->name => 0];
        }

        $this->has_vat = $this->hasVat();

        $this->sub_total = $this->expense->getSubTotal();

        /* Calculate total before taxes. */
        $this->calculateTaxableAmount();

        /* Calculate Grand Total */
        $this->calculateGrandTotal();
    }

    public function render()
    {
        /*
         * Todo: Why is this needed?
         *
         * Why isnt the last expenseItem displayed immediately shown
         * with out getting the fresh instance of expense?
         *
         */
        $this->expense = $this->expense->fresh();

        /* Total (numbers) related */
        $this->sub_total = $this->expense->getSubTotal();

        /* Add item related */
        $this->expenseCategories = ExpenseCategory::all();

        /* Make payment related */
        $this->expensePaymentTypes = ExpensePaymentType::all();

        return view('livewire.expense-create-new');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function addItemToExpense()
    {
        $validatedData = $this->validate([
            'add_item_name' => 'required',
            'add_item_expense_category_id' => 'required|integer',
            'add_item_amount' => 'required|integer',
        ]);

        $expenseItem = new ExpenseItem;

        $expenseItem->name = $validatedData['add_item_name'];
        $expenseItem->expense_id = $this->expense->expense_id;
        $expenseItem->expense_category_id = $validatedData['add_item_expense_category_id'];
        $expenseItem->amount = $validatedData['add_item_amount'];

        $expenseItem->save();

        $this->item_count ++;
        $this->resetInputFields();
        $this->updateNumbers();
    }

    public function resetInputFields()
    {
        $this->add_item_name = '';
        $this->add_item_expense_category_id = '';
        $this->add_item_amount = '';
    }

    public function updateNumbers()
    {
        /* Todo: Why need to get fresh instance? */
        $this->expense = $this->expense->fresh();

        $this->sub_total = $this->expense->getSubTotal();

        $this->taxable_amount = $this->sub_total;

        $this->calculateGrandTotal();
    }

    public function calculateGrandTotal()
    {
        /* Todo: Any validation needed ? */

        /* Todo: Really Hard code VAT ? Better way? */
        if ($this->has_vat) {
            $this->grand_total = $this->taxable_amount + $this->expenseAdditions['VAT'] ;
        } else {
            $this->grand_total = $this->taxable_amount;
        }
    }

    public function hasVat()
    {
        if (ExpenseAdditionHeading::where('name', 'vat')->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function calculateTaxableAmount()
    {
        /* TODO
        $validatedData = $this->validate([
            'discount' => 'required|integer',
            'service_charge' => 'required|integer',
        ]);
        */

        $this->taxable_amount = $this->sub_total;

        foreach ($this->expenseAdditions as $key => $val) {

            /* Dont add VAT (or any other taxes) while calculating taxable amount. */
            if ($key == 'VAT') {
                continue;
            }

            if (strtolower(ExpenseAdditionHeading::where('name', $key)->first()->effect) == 'plus') {
                if (is_numeric($val)) {
                    $this->taxable_amount += $val;
                }
            } else if (strtolower(ExpenseAdditionHeading::where('name', $key)->first()->effect) == 'minus') {
                if (is_numeric($val)) {
                    $this->taxable_amount -= $val;
                }
            } else {
                dd('Expense addition heading configurations gone wrong! Contact your service provider.');
            }
        }
    }

    public function updatedExpenseAdditions()
    {
        $this->updateNumbers();
    }

    public function finishCreation()
    {
        $validatedData = $this->validate([
            'tender_amount' => 'required|integer',
            'grand_total' => 'required|integer',
            'expense_payment_type_id' => 'required|integer',
        ]);

        if ($validatedData['tender_amount'] > $validatedData['grand_total']) {
            return;
        }

        $expense = $this->expense->fresh();

        DB::beginTransaction();

        try {
            /* Create Expense Additions if needed. */
            foreach ($this->expenseAdditions as $key => $val) {
                if ($val > 0) {
                    $expenseAdditionHeading = ExpenseAdditionHeading::where('name', $key)->first();

                    $expenseAddition = new ExpenseAddition;

                    $expenseAddition->expense_id = $expense->expense_id;
                    $expenseAddition->expense_addition_heading_id = $expenseAdditionHeading->expense_addition_heading_id;
                    $expenseAddition->amount = $val;

                    $expenseAddition->save();
                }
            }

            /* Create expense payment */
            $expensePayment = new ExpensePayment;

            $expensePayment->payment_date = date('Y-m-d');
            $expensePayment->expense_id = $expense->expense_id;
            $expensePayment->expense_payment_type_id = $validatedData['expense_payment_type_id'];
            $expensePayment->amount = $validatedData['tender_amount'];

            $expensePayment->save();

            $expense->payment_status = 'paid';
            $expense->save();

            $this->expense = $expense->fresh();

            /* Make accounting entries */
            // $this->makeExpenseAccountingEntry($expense);

            DB::commit();

            $this->enterMode('paid');
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }

    public function linkVendorToExpense()
    {
        $validatedData = $this->validate([
            'vendor_id' => 'required|integer',
        ]);

        $this->expense->vendor_id = $validatedData['vendor_id'];
        $this->expense->save();
        $this->expense = $this->expense->fresh();

        $this->modes['vendorSelected'] = true;
    }
}
