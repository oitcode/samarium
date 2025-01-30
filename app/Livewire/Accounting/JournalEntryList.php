<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use App\JournalEntry;

class JournalEntryList extends Component
{
    public $journalEntries;

    public function render()
    {
        $this->journalEntries = JournalEntry::all();

        return view('livewire.accounting.journal-entry-list');
    }
}
