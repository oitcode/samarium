<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ExpenseDisplay extends Component
{
    public $expense;

    public function render()
    {
        return view('livewire.expense-display');
    }
}
