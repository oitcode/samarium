<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use App\AbAccount;

class AccountingAccountList extends Component
{
    public Collection $abAccounts;

    public function render(): View
    {
        $this->abAccounts = AbAccount::all();

        return view('livewire.accounting.accounting-account-list');
    }
}
