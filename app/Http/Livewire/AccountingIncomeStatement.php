<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\AbAccount;
use App\Company;

class AccountingIncomeStatement extends Component
{
    public $company;

    public $revenueItems = array();
    public $cogsItems = array();
    public $expenseItems = array();

    public $revenueTotal;
    public $cogsTotal;
    public $expenseTotal;

    public $grossProfit;
    public $netProfit;


    public function render()
    {
        $this->company = Company::first();

        $this->populateRevenue();
        $this->populateCogs();
        $this->populateExpense();

        $this->calculateGrossProfit();
        $this->calculateNetProfit();

        return view('livewire.accounting-income-statement');
    }

    public function populateRevenue()
    {
        $total = 0;

        $salesAbAccount = AbAccount::where('name', 'sales')->first();

        $salesRevenue['name'] = 'Sales';
        $salesRevenue['amount'] = $salesAbAccount->getLedgerBalance() * -1;

        $this->revenueTotal = $salesRevenue['amount'];

        $this->revenueItems[] = $salesRevenue;
    }

    public function populateCogs()
    {
        $purchaseAbAccount = AbAccount::where('name', 'purchase')->first();

        $purchaseCogs['name'] = 'Purchase';
        $purchaseCogs['amount'] = $purchaseAbAccount->getLedgerBalance();

        $this->cogsTotal = $purchaseCogs['amount'];

        $this->cogsItems[] = $purchaseCogs;
    }

    public function populateExpense()
    {
        $expenseAbAccount = AbAccount::where('name', 'expense')->first();

        $expense['name'] = 'Expense';
        $expense['amount'] = $expenseAbAccount->getLedgerBalance();

        $this->expenseTotal = $expense['amount'];

        $this->expenseItems[] = $expense;
    }

    public function calculateGrossProfit()
    {
        $this->grossProfit = $this->revenueTotal - $this->cogsTotal;
    }

    public function calculateNetProfit()
    {
        $this->netProfit = $this->grossProfit - $this->expenseTotal;
    }
}
