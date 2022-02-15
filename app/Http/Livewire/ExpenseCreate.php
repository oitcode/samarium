<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ExpenseCategory;
use App\Expense;

class ExpenseCreate extends Component
{
    public $expenseCategories;

    public $name;
    public $expense_category_id;
    public $amount;

    public function render()
    {
        $this->expenseCategories = ExpenseCategory::all();

        return view('livewire.expense-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'expense_category_id' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        $validatedData['date'] = date('Y-m-d');
        Expense::create($validatedData);

        $this->emit('ackExpenseCreated');
        $this->emit('exitCreateMode');
    }
}
