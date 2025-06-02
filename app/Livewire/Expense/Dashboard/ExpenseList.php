<?php

namespace App\Livewire\Expense\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\ModesTrait;
use App\Services\Shop\ExpenseService;
use App\Expense;

/**
 * ExpenseList Component
 * 
 * This Livewire component handles the listing of expenses.
 * It also handles deletion of expenses.
 */
class ExpenseList extends Component
{
    use ModesTrait;
    use WithPagination;

    /**
     * Expenses per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of expenses
     *
     * @var int
     */
    public $totalExpenseCount;

    /**
     * Expense which needs to be deleted
     *
     * @var Expense
     */
    public $deletingExpense = null;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(ExpenseService $expenseService): View
    {
        $expenses = $expenseService->getPaginatedExpenses($this->perPage);

        return view('livewire.expense.dashboard.expense-list', [
            'expenses' => $expenses,
        ]);
    }

    /**
     * Confirm if user really wants to delete a expense
     *
     * @return void
     */
    public function confirmDeleteExpense(int $expense_id, ExpenseService $expenseService): void
    {
        $this->deletingExpense = Expense::find($expense_id);

        if ($expenseService->canDeleteExpense($expense_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel expense delete
     *
     * @return void
     */
    public function cancelDeleteExpense(): void
    {
        $this->deletingExpense = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a expense cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteExpense(): void
    {
        $this->deletingExpense = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete expense
     *
     * @return void
     */
    public function deleteExpense(ExpenseService $expenseService): void
    {
        $expenseService->deleteExpense($this->deletingExpense->expense_id);
        $this->deletingExpense = null;
        $this->exitMode('confirmDelete');
    }
}
