<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ExpenseCategory;

class ExpenseCategoryList extends Component
{
    public $expenseCategories;

    public function render()
    {
        $this->expenseCategories = ExpenseCategory::all();

        return view('livewire.expense-category-list');
    }
}
