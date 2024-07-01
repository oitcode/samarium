<?php

namespace App\Http\Livewire\Accounting;

use Livewire\Component;

use App\AbAccount;

class AccountingAccountList extends Component
{
    public $abAccounts;

    public function render()
    {
        $this->abAccounts = AbAccount::all();

        return view('livewire.accounting.accounting-account-list');
    }
}
