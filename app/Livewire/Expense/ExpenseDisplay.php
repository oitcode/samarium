<?php

namespace App\Livewire\Expense;

use Livewire\Component;

class ExpenseDisplay extends Component
{
    public $expense;

    public function render()
    {
        return view('livewire.expense.expense-display');
    }
}
