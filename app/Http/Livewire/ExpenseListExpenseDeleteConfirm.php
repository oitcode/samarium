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
        DB::beginTransaction();

        try {

            /* Delete expense payments */
            foreach ($expense->expensePayments as $expensePayment) {
                $expensePayment->delete();
            }

            /* Delete expense */
            $expense->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->emit('expenseDeleted');
    }
}
