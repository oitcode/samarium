<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\JournalEntry;

class JournalEntryList extends Component
{
    public $journalEntries;

    public function render()
    {
        $this->journalEntries = JournalEntry::all();

        return view('livewire.journal-entry-list');
    }
}
