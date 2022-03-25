<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\AbAccount;

class AccountingAccountList extends Component
{
    public $abAccounts;

    public function render()
    {
        $this->abAccounts = AbAccount::all();

        return view('livewire.accounting-account-list');
    }
}
