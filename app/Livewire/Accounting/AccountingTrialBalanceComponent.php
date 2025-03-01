<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Illuminate\View\View;
use App\AbAccount;
use App\Company;

class AccountingTrialBalanceComponent extends Component
{
    public $abAccounts;
    public $company;

    public function render(): View
    {
        $this->abAccounts = AbAccount::all();
        $this->company = Company::first();

        return view('livewire.accounting.accounting-trial-balance-component');
    }
}
