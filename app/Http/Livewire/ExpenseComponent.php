<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ExpenseComponent extends Component
{
    public $categoryCreateMode = false;
    public $categoryListMode = false;

    public $createMode = false;
    public $listMode = false;

    public $reportMode = false;

    protected $listeners = [
        'exitCategoryCreateMode',
        'expenseCategoryCreated' => 'acknowledgeExpenseCategoryCreated',

        'exitCreateMode',
        'ackExpenseCreated',
    ];

    public function render()
    {
        return view('livewire.expense-component');
    }

    public function clearModes()
    {
        $this->exitCategoryCreateMode();
        $this->exitCategoryListMode();

        $this->exitCreateMode();
        $this->exitListMode();

        $this->exitReportMode();
    }

    public function enterCategoryCreateMode()
    {
        $this->clearModes();
        $this->categoryCreateMode = true;
    }

    public function exitCategoryCreateMode()
    {
        $this->categoryCreateMode = false;
    }

    public function acknowledgeExpenseCategoryCreated()
    {
        session()->flash('message', 'Expense category added');
    }

    public function enterCategoryListMode()
    {
        $this->clearModes();
        $this->categoryListMode = true;
    }

    public function exitCategoryListMode()
    {
        $this->categoryListMode = false;
    }

    public function enterCreateMode()
    {
        $this->clearModes();
        $this->createMode = true;
    }

    public function exitCreateMode()
    {
        $this->createMode = false;
    }

    public function ackExpenseCreated()
    {
        session()->flash('message', 'Expense added');
    }

    public function enterListMode()
    {
        $this->clearModes();
        $this->listMode = true;
    }

    public function exitListMode()
    {
        $this->listMode = false;
    }

    public function enterReportMode()
    {
        $this->clearModes();
        $this->reportMode = true;
    }

    public function exitReportMode()
    {
        $this->reportMode = false;
    }
}
