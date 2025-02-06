<?php

namespace App\Livewire\Expense;

use App\Traits\MiscTrait;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Vendor;
use App\Expense;
use App\ExpensePaymentType;
use App\ExpensePayment;
use App\ExpenseAddition;
use App\ExpenseAdditionHeading;
use App\JournalEntry;
use App\JournalEntryItem;
use App\AbAccount;
use App\LedgerEntry;


class ExpenseWorkMakePayment extends Component
{
    use MiscTrait;

    public $expense;

    public $total;
    public $pay_by;
    public $tender_amount;

    public $discount = 0;
    public $service_charge = 0;
    public $grand_total;

    /* Amount before taxes (VAT, etc) */
    public $taxable_amount;

    public $has_vat = false;

    public $discount_percentage = null;

    public $returnAmount;

    /* Vendor to which expense will be made */
    public $vendor = null;
    public $vendor_id;

    /* List of customers */
    public $vendors;

    /* Expense addition headings */
    public $expenseAdditionHeadings;

    /* Expense additions */
    public $expenseAdditions = array();

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
        return view('livewire.expense.expense-work-make-payment');
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
                // Todo
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
}
