<?php

namespace App\Livewire\Accounting\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Accounting\AbAccountType;
use App\Models\Accounting\AbAccount;

class AccountingCashFlow extends Component
{
    /* This taken from income statement to calculate retained earnings. */
    public $revenueItems = array();
    public $cogsItems = array();
    public $expenseItems = array();

    public $revenueTotal;
    public $cogsTotal;
    public $expenseTotal;

    public $grossProfit;
    public $netProfit;

    public function render(): View
    {
        /* Calculate net income/profit */
        $this->populateRevenue();
        $this->populateCogs();
        $this->populateExpense();

        $this->calculateGrossProfit();
        $this->calculateNetProfit();

        return view('livewire.accounting.dashboard.accounting-cash-flow');
    }

    /* This taken from income statement to calculate retained earnings. */
    public function populateRevenue(): void
    {
        $total = 0;

        $salesAbAccount = AbAccount::where('name', 'sales')->first();

        $salesRevenue['name'] = 'Sales';
        $salesRevenue['amount'] = $salesAbAccount->getLedgerBalance() * -1;

        $this->revenueTotal = $salesRevenue['amount'];

        $this->revenueItems[] = $salesRevenue;
    }

    public function populateCogs(): void
    {
        $purchaseAbAccount = AbAccount::where('name', 'purchase')->first();

        $purchaseCogs['name'] = 'Purchase';
        $purchaseCogs['amount'] = $purchaseAbAccount->getLedgerBalance();

        $this->cogsTotal = $purchaseCogs['amount'];

        $this->cogsItems[] = $purchaseCogs;
    }

    public function populateExpense(): void
    {
        $expenseAbAccount = AbAccount::where('name', 'expense')->first();

        $expense['name'] = 'Expense';
        $expense['amount'] = $expenseAbAccount->getLedgerBalance();

        $this->expenseTotal = $expense['amount'];

        $this->expenseItems[] = $expense;
    }

    public function calculateGrossProfit(): void
    {
        $this->grossProfit = $this->revenueTotal - $this->cogsTotal;
    }

    public function calculateNetProfit(): void
    {
        $this->netProfit = $this->grossProfit - $this->expenseTotal;
    }
}
