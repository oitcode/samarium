<?php

namespace App\Http\Livewire\DocumentFile\Dashboard;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

use App\DocumentFile;

class DocumentFileList extends Component
{
    public $documentFiles;

    public $documentFilesCount;

    public function render()
    {
        $dfs = new Collection;

        foreach (Auth::user()->userGroups as $userGroup) {
            $documentFilesOfThisGroup = $userGroup->documentFiles;
            $dfs = $dfs->merge($documentFilesOfThisGroup);
        }

        $opdfs = DocumentFile::doesntHave('userGroups')->orderBy('document_file_id', 'desc')->get();
        $dfs = $dfs->merge($opdfs);

        $this->documentFiles = $dfs;

        $this->documentFiles = $this->documentFiles->unique('document_file_id');

        $this->documentFiles = DocumentFile::all();

        return view('livewire.document-file.dashboard.document-file-list');
    }
}
