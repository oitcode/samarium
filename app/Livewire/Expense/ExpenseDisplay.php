<?php

namespace App\Livewire\Expense;

use Livewire\Component;
use Illuminate\View\View;

class ExpenseDisplay extends Component
{
    public $expense;

    public function render(): View
    {
        return view('livewire.expense.expense-display');
    }
}
