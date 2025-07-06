<?php

namespace App\Livewire\Expense\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\ModesTrait;
use App\Traits\TaxTrait;
use App\Models\Expense\Expense;
use App\Models\Expense\ExpenseCategory;
use App\Models\Expense\ExpensePaymentType;
use App\Models\Expense\ExpensePayment;
use App\Models\Expense\ExpenseAdditionHeading;
use App\Models\Expense\ExpenseItem;
use App\Models\Expense\ExpenseAddition;
use App\Models\SaleInvoice\SaleInvoiceAdditionHeading;
use App\Models\Vendor\Vendor;

class ExpenseEditor extends Component
{
    use ModesTrait;
    use TaxTrait;

    public $expense = null;

    public $createNew = true;

    /* Add item related */
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

    public $expense_date;

    public $modes = [
        'multiplePayments' => false,
        'paid' => false,

        'vendorSelected' => false,

        'backDate' => false,
    ];

    public function mount(): void
    {
        $this->vendors = Vendor::all();

        if ($this->createNew == true) {
            $expense = new Expense;

            /* Todo: Set correct value of amount instead of dummy 1. */
            $expense->amount = 1;

            $expense->date = date('Y-m-d');
            $expense->payment_status = 'pending';

            $expense->creation_status = 'progress';

            /* User which created this record. */
            $expense->creator_id = Auth::user()->id;

            $expense->save();

            $this->expense = $expense;
        }

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

        $this->expense_date = $this->expense->date;
    }

    public function render(): View
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

        return view('livewire.expense.dashboard.expense-editor');
    }

    public function addItemToExpense(): void
    {
        $validatedData = $this->validate([
            'add_item_name' => 'required',
            'add_item_expense_category_id' => 'required|integer',
            'add_item_amount' => 'required',
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

    public function resetInputFields(): void
    {
        $this->add_item_name = '';
        $this->add_item_expense_category_id = '';
        $this->add_item_amount = '';
    }

    public function updateNumbers(): void
    {
        /* Todo: Why need to get fresh instance? */
        $this->expense = $this->expense->fresh();

        $this->sub_total = $this->expense->getSubTotal();

        $this->taxable_amount = $this->sub_total;

        $this->calculateGrandTotal();

        $this->expense = $this->expense->fresh();
    }

    public function calculateGrandTotal(): void
    {
        /* Todo: Any validation needed ? */

        /* Todo: Really Hard code VAT ? Better way? */
        if ($this->has_vat) {
            if (array_key_exists('vat', $this->expenseAdditions)) {
                $this->grand_total = $this->taxable_amount + $this->expenseAdditions['vat'] ;
            } else if (array_key_exists('VAT', $this->expenseAdditions)) {
                $this->grand_total = $this->taxable_amount + $this->expenseAdditions['VAT'] ;
            }
        } else {
            $this->grand_total = $this->taxable_amount;
        }
    }

    public function calculateTaxableAmount(): void
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
            if ($key == 'VAT' || $key == 'vat') {
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
                // Todo
            }
        }
    }

    public function updatedExpenseAdditions(): void
    {
        $this->updateNumbers();
    }

    public function finishCreation(): void
    {
        $validatedData = $this->validate([
            'tender_amount' => 'required',
            'grand_total' => 'required',
            'expense_payment_type_id' => 'required|integer',
        ]);

        if ($validatedData['tender_amount'] > $validatedData['grand_total']) {
            return;
        }

        $expense = $this->expense->fresh();

        /* Vendor compulsory if tender amount is less than grand total. */
        if (! $expense->vendor
            && $validatedData['tender_amount'] < $validatedData['grand_total']) {
            return;
        }

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
            $expense->creation_status = 'created';
            $expense->save();

            $this->expense = $expense->fresh();

            /* Make accounting entries */
            // $this->makeExpenseAccountingEntry($expense);

            DB::commit();

            $this->enterMode('paid');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }

    public function linkVendorToExpense(): void
    {
        $validatedData = $this->validate([
            'vendor_id' => 'required|integer',
        ]);

        $this->expense->vendor_id = $validatedData['vendor_id'];
        $this->expense->save();
        $this->expense = $this->expense->fresh();

        $this->modes['vendorSelected'] = true;
    }

    public function changeExpenseDate(): void
    {
        $validatedData = $this->validate([
            'expense_date' => 'required|date',
        ]);

        if ($this->expense) {
            $expense = $this->expense;
            $expense->date = $validatedData['expense_date'];
            $expense->save();

            $this->expense = $expense->fresh();
        }

        $this->modes['backDate'] = false;
        $this->render();
    }
}
