<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use App\AbAccount;
use App\Traits\ModesTrait;

class AccountingComponent extends Component
{
    use ModesTrait;

    public $displayingLedgerAbAccount;

    public $modes = [
        'create' => false,
        'list' => false,
        'journal' => false,
        'ledger' => false,
        'trialBalance' => false,

        'incomeStatement' => false,
        'balanceSheet' => false,
        'cashFlow' => false,

        'accountTypeList' => false,
        'accountTypeCreate' => false,
    ];

    protected $listeners = [
        'abAccountAdded',
        'displayAbAccountLedger',
        'exitCreateMode',

        'exitAccountTypeCreateMode',
    ];

    public function render()
    {
        return view('livewire.accounting.accounting-component');
    }

    public function abAccountAdded()
    {
        $this->exitMode('create');
    }

    public function displayAbAccountLedger($abAccountId)
    {
        $abAccount = AbAccount::find($abAccountId);

        $this->displayingLedgerAbAccount = $abAccount;

        $this->enterMode('displayLedger');
    }

    public function exitCreateMode()
    {
        $this->exitMode('create');
    }

    public function exitAccountTypeCreateMode()
    {
        $this->exitMode('accountTypeCreate');
    }
}
