<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\LedgerEntry;

class LedgerDisplay extends Component
{
    public $abAccount;

    public $ledgerEntries;

    public function render()
    {
        $this->ledgerEntries = $this->abAccount->ledgerEntries;

        return view('livewire.ledger-display');
    }
}
