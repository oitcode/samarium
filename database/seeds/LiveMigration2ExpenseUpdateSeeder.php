<?php

use Illuminate\Database\Seeder;

use App\Expense;
use App\ExpenseItem;

class LiveMigration2ExpenseUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Get all expenses
        // Foreach expense
        //    Create an expense item with same amount and same category
        //    Set its foreigh key (expense_id) to expense
        
        $expenses = Expense::all();

        foreach ($expenses as $expense) {

            $expenseItem = new ExpenseItem;

            $expenseItem->expense_id = $expense->expense_id;

            $expenseItem->name = $expense->name;
            $expenseItem->expense_category_id = $expense->expense_category_id;
            $expenseItem->amount = $expense->amount;

            $expenseItem->save();
        }
    }
}
