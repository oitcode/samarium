<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Illuminate\View\View;

class AccountingJournalBook extends Component
{
    public function render(): View
    {
        return view('livewire.accounting.accounting-journal-book');
    }
}
