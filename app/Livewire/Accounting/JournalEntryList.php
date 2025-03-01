<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Illuminate\View\View;
use App\JournalEntry;

class JournalEntryList extends Component
{
    public $journalEntries;

    public function render(): View
    {
        $this->journalEntries = JournalEntry::all();

        return view('livewire.accounting.journal-entry-list');
    }
}
