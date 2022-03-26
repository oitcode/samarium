<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\AbAccount;

class AccountingTrialBalanceComponent extends Component
{
    public $abAccounts;

    public function render()
    {
        $this->abAccounts = AbAccount::all();

        return view('livewire.accounting-trial-balance-component');
    }
}
