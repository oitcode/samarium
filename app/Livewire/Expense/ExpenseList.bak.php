<?php

namespace App\Livewire\Expense;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\ModesTrait;
use App\Expense;

/**
 * ExpenseList Component
 * 
 * This Livewire component handles the listing of expenses.
 * It also handles deletion of expenses.
 */
class ExpenseList extends Component
{
    use ModesTrait;
    use WithPagination;

    public $startDate = null;
    public $endDate = null;
    public $total = 0;

    public $deletingExpense = null;

    public $modes = [
        'confirmDeleteExpense' => false,
    ];

    protected $listeners = [
        'expenseDeleted' => 'ackExpenseDeleted',
        'exitConfirmExpenseDelete',
        'deleteExpenseFromList',
    ];

    public function mount(): void
    {
        $this->startDate = date('Y-m-d');
    }

    public function render(): View
    {
        $this->getExpensesForDateRange();
        $this->calculateTotal();

        $expenses = Expense::orderBy('expense_id', 'DESC')->paginate(5);

        return view('livewire.expense.expense-list')
            ->with('expenses', $expenses);
    }

    public function calculateTotal(): void
    {
        $this->total = 0;

        if (! is_null($this->expenses) && count($this->expenses) > 0) {
            foreach ($this->expenses as $expense) {
                $this->total += $expense->getTotalAmount();
            }
        }
    }

    public function getExpensesForDateRange(): void
    {
        /* Todo: Validation */
        $validatedData = $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'nullable|date',
        ]);

        /*
         * Todo: Validate that endDate is not smaller than startDate
         *
         * Well, below is a simple validation.
         *
         * TOdo: Need to do in livewire / laravel specific way.
         *
         */

        try {
            if ($validatedData['endDate']) {
                if (! $validatedData['startDate']) {
                    return;
                }

                if ($validatedData['startDate'] > $validatedData['endDate']) {
                    return;
                }
            }

            if ($validatedData['endDate']) {
                $expenses = Expense::whereDate('date', '>=', $validatedData['startDate'])
                    ->whereDate('date', '<=', $validatedData['endDate'])
                    ->orderBy('expense_id', 'desc')
                    ->get();
            } else {
                $expenses = Expense::whereDate('date', $validatedData['startDate'])
                    ->orderBy('expense_id', 'desc')
                    ->get();
            }
        } catch(\Throwable $e) {
            Log::error($e);
        }

        $this->expenses = $expenses;
    }

    public function enterConfirmDeleteExpenseMode(Expense $expense): void
    {
        $this->deletingExpense = $expense;

        $this->enterMode('confirmDeleteExpense');
    }

    public function exitConfirmExpenseDelete(): void
    {
        $this->deletingExpense = null;

        $this->exitMode('confirmDeleteExpense');
    }

    public function ackExpenseDeleted(): void
    {
        $this->deletingExpense = null;
        $this->exitMode('confirmDeleteExpense');
        $this->getExpensesForDateRange();
    }

    public function setPreviousDay(): void
    {
        $this->startDate = Carbon::create($this->startDate)->subDay()->toDateString();
    }

    public function setNextDay(): void
    {
        $this->startDate = Carbon::create($this->startDate)->addDay()->toDateString();
    }

    /*
     * Todo: This function had to be moved from delete confirm modal
     *       to here as a code fix for bug #2 . Why?
     *
     *
     */
    public function deleteExpenseFromList(Expense $expense): void
    {
        DB::beginTransaction();

        try {
            /* Delete expense items */
            foreach ($expense->expenseItems as $item) {
                /* Delete expense item */
                $item->delete();
            }

            /* Delete expense additions payments */
            foreach ($expense->expenseAdditions as $expenseAddition) {
                $expenseAddition->delete();
            }

            /* Delete expense payments */
            foreach ($expense->expensePayments as $expensePayment) {
                $expensePayment->delete();
            }

            /* Delete expense */
            $expense->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->deletingExpense = null;
        $this->exitMode('confirmDeleteExpense');
        $this->getExpensesForDateRange();
    }
}
