<?php

namespace App\Http\Livewire;

use App\Traits\MiscTrait;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Expense;
use App\ExpenseCategory;
use App\ExpensePayment;
use App\ExpensePaymentType;

use App\ExpenseAddition;
use App\ExpenseAdditionHeading;

use App\Vendor;

use App\JournalEntry;
use App\JournalEntryItem;
use App\AbAccount;
use App\LedgerEntry;

class ExpenseCreate extends Component
{
    use MiscTrait;

    public $expenseCategories;

    public $name;
    public $expense_category_id;
    public $amount;

    public $expense;


    /* Amounts */
    public $total;
    public $sub_total;
    public $expenseAdditions = array();
    public $taxable_amount;
    public $grand_total;
    public $tender_amount;


    /* VAT info */
    public $has_vat = false;

    /* Todo: Discount in expense? */
    public $discount_percentage = null;


    /* Vendor related */
    public $vendors;
    /* Vendor to which expense will be made */
    public $vendor = null;
    public $vendor_id;

    /* Expense addition headings */
    public $expenseAdditionHeadings;

    /* Expense payment types */
    public $expensePaymentTypes;
    public $expense_payment_type_id;

    /* Multiple payments */
    public $multiPayments = array();


    public $modes = [
        'paid' => false,
        'multiplePayments' => false,
    ];

    protected $listeners = [
      'makePaymentPleaseUpdate' => 'mount',
      'updatePaymentComponent' => 'mount',
    ];

    public function mount()
    {
        $this->has_vat = $this->hasVat();

        $this->expensePaymentTypes = ExpensePaymentType::all();

        $this->expenseAdditionHeadings = ExpenseAdditionHeading::all();

        foreach (ExpenseAdditionHeading::all() as $expenseAddition) {
            $this->expenseAdditions += [$expenseAddition->name => 0];
        }

        if ($this->expense) {
            $this->total = $this->expense->getTotalAmountRaw();
        } else {
            $this->total = 0;
        }

        /* Calculate total before taxes. */
        $this->calculateTaxableAmount();

        if ($this->has_vat) {
            $this->expenseAdditions['VAT'] = $this->calculateExpenseVat();
        }

        /* Calculate Grand Total */
        $this->calculateGrandTotal();

        $this->vendors = Vendor::all();
    }

    public function render()
    {
        $this->expenseCategories = ExpenseCategory::all();
        $this->expensePaymentTypes = ExpensePaymentType::all();

        return view('livewire.expense-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'expense_category_id' => 'required|integer',
            'sub_total' => 'required|integer',
            'taxable_amount' => 'required|integer',
            'grand_total' => 'required|integer',
            'expense_payment_type_id' => 'required|integer',
        ]);

        $validatedData['date'] = date('Y-m-d');
        $validatedData['amount'] = $validatedData['sub_total'];

        DB::beginTransaction();

        try {
            $expense = Expense::create($validatedData);

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
            $expensePayment->amount = $validatedData['amount'];

            $expensePayment->save();

            /* Make accounting entries */
            // $this->makeExpenseAccountingEntry($expense);

            DB::commit();

            $this->emit('expenseCreated');
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }

    public function calculateTaxableAmount()
    {
        $this->taxable_amount = $this->total;

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

    public function calculateExpenseVat()
    {
        return ceil(0.13 * $this->taxable_amount);
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

    public function updateNumbers()
    {
        $this->taxable_amount = $this->sub_total;

        $this->calculateGrandTotal();
    }

    public function updatedSubTotal()
    {
        $this->updateNumbers();
    }

    public function updatedExpenseAdditions()
    {
        $this->updateNumbers();
    }
}
