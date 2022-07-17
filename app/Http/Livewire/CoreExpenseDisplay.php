<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CoreExpenseDisplay extends Component
{
    public $expense;

    public function render()
    {
        return view('livewire.core-expense-display');
    }
}
