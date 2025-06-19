<?php

namespace App\Livewire\Expense\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Traits\MiscTrait;
use App\Traits\TaxTrait;
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
    use TaxTrait;

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

    public function mount(): void
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

    public function render(): View
    {
        return view('livewire.expense.dashboard.expense-work-make-payment');
    }

    public function calculateTaxableAmount(): void
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

    public function calculateExpenseVat(): int
    {
        return ceil(0.13 * $this->taxable_amount);
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
}
