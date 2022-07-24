<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Expense;

class ExpenseListExpenseDeleteConfirm extends Component
{
    public $expense;

    public function render()
    {
        return view('livewire.expense-list-expense-delete-confirm');
    }

    public function deleteExpense(Expense $expense)
    {

        $this->emit('deleteExpenseFromList', $expense);


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
        //     dd ($e);
        //     session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        // }

        // //dd ('Boom');
        // $this->emit('expenseDeleted');
    }
}
