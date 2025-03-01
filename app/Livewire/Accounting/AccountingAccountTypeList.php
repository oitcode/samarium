<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Illuminate\View\View;
use App\AbAccountType;

class AccountingAccountTypeList extends Component
{
    public $abAccountTypes;

    public function render(): View
    {
        $this->abAccountTypes = AbAccountType::all();

        return view('livewire.accounting.accounting-account-type-list');
    }
}
