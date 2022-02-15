<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Expense;

class ExpenseList extends Component
{
    public $expenses;

    public function render()
    {
        $this->expenses = Expense::all();

        return view('livewire.expense-list');
    }
}
