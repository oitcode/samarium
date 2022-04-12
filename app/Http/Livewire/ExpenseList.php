<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Expense;

class ExpenseList extends Component
{
    public $expenses = null;

    public $startDate = null;
    public $endDate = null;
    public $total = 0;

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

        $this->expenses = $expenses;
    }
}
