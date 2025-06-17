<?php

namespace App\Livewire\DocumentFile\Website;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\DocumentFile\DocumentFile;

class DocumentFileList extends Component
{
    public $documentFiles;

    public $documentFilesCount;

    public function render(): View
    {
        $dfs = new Collection;

        $dfs = DocumentFile::doesntHave('userGroups')->orderBy('document_file_id', 'desc')->get();

        $this->documentFiles = $dfs;

        $this->documentFiles = $this->documentFiles->unique('document_file_id');

        return view('livewire.document-file.website.document-file-list');
    }
}
