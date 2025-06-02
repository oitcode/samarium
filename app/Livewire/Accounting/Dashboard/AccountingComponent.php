<?php

namespace App\Livewire\Accounting\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        return view('livewire.accounting.dashboard.accounting-component');
    }

    public function abAccountAdded(): void
    {
        $this->exitMode('create');
    }

    public function displayAbAccountLedger($abAccountId): void
    {
        $abAccount = AbAccount::find($abAccountId);

        $this->displayingLedgerAbAccount = $abAccount;

        $this->enterMode('displayLedger');
    }

    public function exitCreateMode(): void
    {
        $this->exitMode('create');
    }

    public function exitAccountTypeCreateMode(): void
    {
        $this->exitMode('accountTypeCreate');
    }
}
