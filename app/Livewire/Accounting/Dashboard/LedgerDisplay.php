<?php

namespace App\Livewire\Accounting\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Accounting\LedgerEntry;

class LedgerDisplay extends Component
{
    public $abAccount;

    public $ledgerEntries;

    public function render(): View
    {
        $this->ledgerEntries = $this->abAccount->ledgerEntries;

        return view('livewire.accounting.dashboard.ledger-display');
    }
}
