<?php

namespace App\Http\Livewire\DocumentFile\Dashboard;

use Livewire\Component;

use App\DocumentFile;

class DocumentFileList extends Component
{
    public $documentFiles;

    public $documentFilesCount;

    public function render()
    {
        $this->documentFiles = DocumentFile::all();
        $this->documentFilesCount = DocumentFile::count();

        return view('livewire.document-file.dashboard.document-file-list');
    }
}
