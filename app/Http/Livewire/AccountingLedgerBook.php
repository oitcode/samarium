<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\AbAccount;

class AccountingLedgerBook extends Component
{
    public $selectedAbAccount = null;
    public $debitTotal;
    public $creditTotal;
    public $closingBalance;

    public $abAccounts;

    public $selected_account_id;

    public function render()
    {
        $this->abAccounts = AbAccount::all();

        return view('livewire.accounting-ledger-book');
    }

    public function selectAbAccount()
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

    public function getDebitTotal($abAccount)
    {
        $total = 0;

        foreach ($abAccount->ledgerEntries as $ledgerEntry) {
            if ($ledgerEntry->type == 'debit') {
                $total += $ledgerEntry->amount;
            }
        }

        return $total;
    }

    public function getCreditTotal($abAccount)
    {
        $total = 0;

        foreach ($abAccount->ledgerEntries as $ledgerEntry) {
            if ($ledgerEntry->type == 'credit') {
                $total += $ledgerEntry->amount;
            }
        }

        return $total;
    }

    public function getClosingBalance()
    {
        $this->closingBalance = $this->debitTotal - $this->creditTotal;
    }
}
