<?php

namespace App\Livewire\Expense\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Traits\MiscTrait;
use App\Traits\ModesTrait;
use App\Traits\TaxTrait;
use App\Models\Expense\Expense;
use App\Models\Expense\ExpensePaymentType;
use App\Models\Expense\ExpensePayment;
use App\Models\Expense\ExpenseAddition;
use App\Models\Expense\ExpenseAdditionHeading;
use App\Models\Accounting\JournalEntry;
use App\Models\Accounting\JournalEntryItem;
use App\Models\Accounting\AbAccount;
use App\Models\Accounting\LedgerEntry;

class ExpenseEditorMakePayment extends Component
{
    use MiscTrait;
    use ModesTrait;
    use TaxTrait;

    public $expense;

    public $total;
    public $pay_by;
    public $tender_amount;
    public $paid_amount;

    public $discount = 0;
    public $service_charge = 0;
    public $grand_total;

    /* Amount before taxes (VAT, etc) */
    public $taxable_amount;

    public $has_vat = false;

    public $discount_percentage = null;

    public $returnAmount;

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
        'itemAddedToExpense' => 'render',
    ];

    public function render(): View
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

        $this->taxable_amount = $this->total;
        $this->grand_total = $this->total;

        // Todo: Skip this for now. Need to find out how taxes
        // on expenses are dealt with in real world. Need
        // to update the code accordingly. Skip for now.
        // 
        // /* Calculate total before taxes. */
        // $this->calculateTaxableAmount();
        //
        // if ($this->has_vat) {
        //     $this->expenseAdditions['VAT'] = $this->calculateExpenseVat();
        // }
        //
        // /* Calculate Grand Total */
        // $this->calculateGrandTotal();

        return view('livewire.expense.dashboard.expense-editor-make-payment');
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

    public function store(): void
    {
        $validatedData = $this->validate([
            'paid_amount' => 'required|integer',
            'expense_payment_type_id' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $expensePayment = new ExpensePayment;

            $expensePayment->expense_id = $this->expense->expense_id;
            $expensePayment->expense_payment_type_id = $validatedData['expense_payment_type_id'];
            $expensePayment->payment_date = date('Y-m-d');
            $expensePayment->amount = $validatedData['paid_amount'];

            $expensePayment->save();

            $this->expense->payment_status = 'paid';
            $this->expense->save();

            /* Make accounting entries */
            //$this->makePurchaseAccountingEntry($this->purchase);

            DB::commit();

            $this->enterMode('paid');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }

    public function finishPayment(): void
    {
        $this->dispatch('exitMakePaymentMode');
    }
}
