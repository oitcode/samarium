<?php

namespace App\Livewire\DocumentFile\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\DocumentFile\DocumentFileService;
use App\DocumentFile;

/**
 * DocumentFileList Component
 * 
 * This Livewire component handles the listing of document files.
 * It also handles deletion of document files.
 */
class DocumentFileList extends Component
{
    use WithPagination;
    use ModesTrait;

    public $documentFilesCount;

    /**
     * Document files per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of document files
     *
     * @var int
     */
    public $totalDocumentFileCount;

    /**
     * Document file which needs to be deleted
     *
     * @var UrlLink
     */
    public $deletingDocumentFile;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
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

    /**
     * Confirm if user really wants to delete a document file
     *
     * @return void
     */
    public function confirmDeleteDocumentFile(int $document_file_id, DocumentFileService $documentFileService): void
    {
        $this->deletingDocumentFile = DocumentFile::find($document_file_id);

        if ($documentFileService->canDeleteDocumentFile($document_file_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel document file delete
     *
     * @return void
     */
    public function cancelDeleteDocumentFile(): void
    {
        $this->deletingDocumentFile = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that an document file cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteDocumentFile(): void
    {
        $this->deletingDocumentFile = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete document file
     *
     * @return void
     */
    public function deleteDocumentFile(DocumentFileService $documentFileService): void
    {
        $documentFileService->deleteDocumentFile($this->deletingDocumentFile->document_file_id);
        $this->deletingDocumentFile = null;
        $this->exitMode('confirmDelete');
    }
}
