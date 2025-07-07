<?php

namespace App\Livewire\Expense\Dashboard;

use Livewire\Component;
use App\Models\Expense\ExpenseCategory;
use App\Models\Expense\ExpenseItem;

class ExpenseEditorAddItem extends Component
{
    public $expense;

    public $expenseCategories; 

    /* Expense item related */
    public $add_item_name;
    public $add_item_expense_category_id;
    public $add_item_amount;

    public function render()
    {
        $this->expenseCategories = ExpenseCategory::all();

        return view('livewire.expense.dashboard.expense-editor-add-item');
    }

    public function addItemToExpense(): void
    {
        $validatedData = $this->validate([
            'add_item_name' => 'required',
            'add_item_expense_category_id' => 'required|integer',
            'add_item_amount' => 'required',
        ]);

        $expenseItem = new ExpenseItem;

        $expenseItem->name = $validatedData['add_item_name'];
        $expenseItem->expense_id = $this->expense->expense_id;
        $expenseItem->expense_category_id = $validatedData['add_item_expense_category_id'];
        $expenseItem->amount = $validatedData['add_item_amount'];

        $expenseItem->save();

        $this->resetInputFields();
        $this->dispatch('itemAddedToExpense');
    }

    public function resetInputFields(): void
    {
        $this->add_item_name = '';
        $this->add_item_expense_category_id = '';
        $this->add_item_amount = '';
    }

}
