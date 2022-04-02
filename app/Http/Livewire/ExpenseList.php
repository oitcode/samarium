<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Expense;

class ExpenseList extends Component
{
    public $expenses = null;

    public $total;

    public function render()
    {
        $this->expenses = Expense::all();
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
}
