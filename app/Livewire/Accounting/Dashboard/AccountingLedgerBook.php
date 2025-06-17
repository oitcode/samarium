<?php

namespace App\Livewire\Accounting\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Accounting\AbAccount;

class AccountingLedgerBook extends Component
{
    public $selectedAbAccount = null;
    public $debitTotal;
    public $creditTotal;
    public $closingBalance;

    public $abAccounts;

    public $selected_account_id;

    public function render(): View
    {
        $this->abAccounts = AbAccount::all();

        return view('livewire.accounting.dashboard.accounting-ledger-book');
    }

    public function selectAbAccount(): void
    {
        $validatedData = $this->validate([
            'selected_account_id' => 'required|integer',
        ]);

        $abAccount = AbAccount::find($validatedData['selected_account_id']);
        $this->selectedAbAccount = $abAccount;

        $this->debitTotal = $this->getDebitTotal($abAccount);
        $this->creditTotal = $this->getCreditTotal($abAccount);

        $this->getClosingBalance();
    }

    public function getDebitTotal($abAccount): int | float
    {
        $total = 0;

        foreach ($abAccount->ledgerEntries as $ledgerEntry) {
            if ($ledgerEntry->type == 'debit') {
                $total += $ledgerEntry->amount;
            }
        }

        return $total;
    }

    public function getCreditTotal($abAccount): int | float
    {
        $total = 0;

        foreach ($abAccount->ledgerEntries as $ledgerEntry) {
            if ($ledgerEntry->type == 'credit') {
                $total += $ledgerEntry->amount;
            }
        }

        return $total;
    }

    public function getClosingBalance(): void
    {
        $this->closingBalance = $this->debitTotal - $this->creditTotal;
    }
}
