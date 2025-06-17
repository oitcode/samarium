<?php

namespace App\Livewire\Accounting\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Accounting\JournalEntry;

class JournalEntryList extends Component
{
    public $journalEntries;

    public function render(): View
    {
        $this->journalEntries = JournalEntry::all();

        return view('livewire.accounting.dashboard.journal-entry-list');
    }
}
