<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

use App\Expense;

class ExpenseList extends Component
{
    public $expenses = null;

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
    ];

    public function mount()
    {
        $this->startDate = date('Y-m-d');
    }

    public function render()
    {
        $this->getExpensesForDateRange();
        $this->calculateTotal();

        return view('livewire.expense-list');
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

    public function calculateTotal()
    {
        $this->total = 0;

        if (! is_null($this->expenses) && count($this->expenses) > 0) {
            foreach ($this->expenses as $expense) {
                $this->total += $expense->amount;
            }
        }
    }

    public function getExpensesForDateRange()
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
                $expenses = Expense::whereDate('created_at', '>=', $validatedData['startDate'])
                    ->whereDate('created_at', '<=', $validatedData['endDate'])
                    ->orderBy('expense_id', 'desc')
                    ->get();
            } else {
                $expenses = Expense::whereDate('created_at', $validatedData['startDate'])
                    ->orderBy('expense_id', 'desc')
                    ->get();
            }
        } catch(\Throwable $e) {
            Log::error($e);
        }

        $this->expenses = $expenses;
    }

    public function enterConfirmDeleteExpenseMode(Expense $expense)
    {
        $this->deletingExpense = $expense;

        $this->enterMode('confirmDeleteExpense');
    }

    public function exitConfirmExpenseDelete()
    {
        $this->deletingExpense = null;

        $this->exitMode('confirmDeleteExpense');
    }

    public function ackExpenseDeleted()
    {
        //$this->deletingExpense = null;
        //$this->exitMode('confirmDeleteExpense');
        //$this->getExpensesForDateRange();
    }

    public function setPreviousDay()
    {
        $this->startDate = Carbon::create($this->startDate)->subDay()->toDateString();
    }

    public function setNextDay()
    {
        $this->startDate = Carbon::create($this->startDate)->addDay()->toDateString();
    }
}
