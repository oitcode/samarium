<?php

namespace App\Livewire\Accounting\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class AccountingJournalBook extends Component
{
    public function render(): View
    {
        return view('livewire.accounting.dashboard.accounting-journal-book');
    }
}
