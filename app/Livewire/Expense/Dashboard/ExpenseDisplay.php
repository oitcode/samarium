<?php

namespace App\Livewire\Expense\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ExpenseDisplay extends Component
{
    public $expense;

    public function render(): View
    {
        return view('livewire.expense.dashboard.expense-display');
    }
}
