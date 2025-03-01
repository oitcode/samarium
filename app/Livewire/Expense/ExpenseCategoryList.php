<?php

namespace App\Livewire\Expense;

use Livewire\Component;
use Illuminate\View\View;
use App\ExpenseCategory;

class ExpenseCategoryList extends Component
{
    public $expenseCategories;

    public function render(): View
    {
        $this->expenseCategories = ExpenseCategory::all();

        return view('livewire.expense.expense-category-list');
    }
}
