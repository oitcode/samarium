<?php

namespace App\Livewire\Accounting;

use Livewire\Component;

use App\AbAccountType;

class AccountingAccountTypeList extends Component
{
    public $abAccountTypes;

    public function render()
    {
        $this->abAccountTypes = AbAccountType::all();

        return view('livewire.accounting.accounting-account-type-list');
    }
}
