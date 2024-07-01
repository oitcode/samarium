<?php

namespace App\Http\Livewire\Accounting;

use Livewire\Component;

use App\LedgerEntry;

class LedgerDisplay extends Component
{
    public $abAccount;

    public $ledgerEntries;

    public function render()
    {
        $this->ledgerEntries = $this->abAccount->ledgerEntries;

        return view('livewire.accounting.ledger-display');
    }
}
