<?php

namespace App\Livewire\DocumentFile\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class DocumentFileDisplayPdf extends Component
{
    public $documentFile;

    public function render(): View
    {
        return response()->file('storage/' . $this->documentFile->file_path);

        // return view('livewire.document-file.dashboard.document-file-display-pdf');
    }
}
