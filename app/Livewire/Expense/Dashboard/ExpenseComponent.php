<?php

namespace App\Livewire\Expense\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Expense\Expense;

class ExpenseComponent extends Component
{
    use ModesTrait;

    public $displayingExpense = null;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'report' => false,

        'createCategory' => false,
    ];

    protected $listeners = [
        'exitCreateMode',
        'expenseCategoryCreated',
        'exitCategoryCreateMode',
        'expenseCreated',
        'displayExpense',

        'exitDisplayExpenseMode',
        'exitExpenseDisplayMode',
    ];

    public function render(): View
    {
        return view('livewire.expense.dashboard.expense-component');
    }

    public function exitCreateMode(): void
    {
        $this->exitMode('create');
    }

    public function expenseCreated(): void
    {
        session()->flash('message', 'Expense added');

        $this->exitMode('create');
    }

    public function expenseCategoryCreated(): void
    {
        session()->flash('message', 'Expense category added');

        $this->exitMode('createCategory');
    }

    public function exitCategoryCreateMode(): void
    {
        $this->exitMode('createCategory');
    }

    public function displayExpense(int $expenseId): void
    {
        $this->displayingExpense = Expense::find($expenseId);

        $this->enterMode('display');
    }

    public function exitDisplayExpenseMode(): void
    {
        $this->displayingExpense = null;
        $this->exitMode('display');
        $this->enterMode('list');
    }

    public function exitExpenseDisplayMode(): void
    {
        $this->displayingExpense = null;
        $this->exitMode('display');
        $this->enterMode('list');
    }
}
