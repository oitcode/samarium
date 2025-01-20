<?php

namespace App\Livewire\DocumentFile\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

use App\DocumentFile;

class DocumentFileList extends Component
{
    use WithPagination;

    // public $documentFiles;

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

        $documentFiles = DocumentFile::orderBy('document_file_id', 'DESC')->paginate(2);

        return view('livewire.document-file.dashboard.document-file-list')
            ->with('documentFiles', $documentFiles);
    }
}
