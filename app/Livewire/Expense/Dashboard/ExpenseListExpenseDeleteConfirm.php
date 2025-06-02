<?php

namespace App\Livewire\Expense\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Expense;

class ExpenseListExpenseDeleteConfirm extends Component
{
    public $expense;

    public function render(): View
    {
        return view('livewire.expense.dashboard.expense-list-expense-delete-confirm');
    }

    public function deleteExpense(Expense $expense): void
    {

        $this->dispatch('deleteExpenseFromList', $expense);


        /*
         * Todo: This had to be moved to expense-list as a fix for bug #2. 
         *       Why?
         */

        // DB::beginTransaction();

        // try {
        //     /* Delete expense items */
        //     foreach ($expense->expenseItems as $item) {
        //         /* Delete expense item */
        //         $item->delete();
        //     }

        //     /* Delete expense payments */
        //     foreach ($expense->expensePayments as $expensePayment) {
        //         $expensePayment->delete();
        //     }

        //     /* Delete expense */
        //     $expense->delete();

        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        // }

        // $this->dispatch('expenseDeleted');
    }
}
