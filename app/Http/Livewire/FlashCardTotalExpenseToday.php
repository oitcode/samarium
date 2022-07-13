<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Expense;

class FlashCardTotalExpenseToday extends Component
{
    public $count;
    public $todayExpenseTotalAmount;

    public function render()
    {
        $this->count = Expense::whereDate('created_at', date('Y-m-d'))->count();

        $this->calculateTodayExpenseTotalAmount();

        return view('livewire.flash-card-total-expense-today');
    }

    public function calculateTodayExpenseTotalAmount()
    {
        $total = 0;

        foreach (Expense::whereDate('created_at', date('Y-m-d'))->get() as $expense) {
            $total += $expense->getTotalAmount();
        }

        $this->todayExpenseTotalAmount = $total;
    }
}
