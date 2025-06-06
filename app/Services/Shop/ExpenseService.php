<?php

namespace App\Services\Shop;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Expense\Expense;

class ExpenseService
{
    /**
     * Get paginated list of expenses
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedExpenses(int $perPage = 5): LengthAwarePaginator
    {
        return Expense::orderBy('expense_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new expense
     *
     * @param array $data
     * @return Expense
     */
    public function createExpense(array $data): void // Todo
    {
        // Todo
    }

    /**
     * Check if a expense can be deleted.
     *
     * @param int $expense_id
     * @return bool
     */
    public function canDeleteExpense(int $expense_id): bool
    {
        $expense = Expense::find($expense_id);

        // Todo
        return true;
    }

    /**
     * Delete expense
     *
     * @param int $expense_id
     * @return void
     */
    public function deleteExpense(int $expense_id): void
    {
        $expense = Expense::find($expense_id);

        foreach ($expense->expensePayments as $expensePayment) {
            $expensePayment->delete();
        }

        foreach ($expense->expenseAdditions as $expenseAddition) {
            $expenseAddition->delete();
        }

        foreach ($expense->expenseItems as $expenseItem) {
            $expenseItem->delete();
        }

        $expense->delete();
    }
}
