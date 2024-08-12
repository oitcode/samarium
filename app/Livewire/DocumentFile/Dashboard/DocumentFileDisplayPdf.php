<?php

namespace App\Livewire\DocumentFile\Dashboard;

use Livewire\Component;

class DocumentFileDisplayPdf extends Component
{
    public $documentFile;

    public function render()
    {
        return response()->file('storage/' . $this->documentFile->file_path);

        // return view('livewire.document-file.dashboard.document-file-display-pdf');
    }
}
