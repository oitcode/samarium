<?php

namespace App\Livewire\DocumentFile\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\DocumentFile;

class DocumentFileComponent extends Component
{
    use ModesTrait;

    public $displayingDocumentFile;
    public $pdfDisplayingDocumentFile;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'delete' => false,
        'search' => false,

        'pdfDisplay' => false,
    ];

    protected $listeners = [
        'pdfDisplayDocumentFile',

        'documentFileCreateCancelled',
        'documentFileCreateCompleted',

        'displayDocumentFile',
        'exitDocumentFileDisplay',
    ];

    public function render(): View
    {
        return view('livewire.document-file.dashboard.document-file-component');
    }

    public function documentFileCreateCancelled(): void
    {
        $this->exitMode('create');
    }

    public function documentFileCreateCompleted(): void
    {
        $this->exitMode('create');
    }

    public function pdfDisplayDocumentFile(DocumentFile $documentFile): void
    {
        $this->pdfDisplayingDocumentFile = $documentFile;
        $this->enterMode('pdfDisplay');
    }

    public function displayDocumentFile(int $documentFileId): void
    {
        $this->displayingDocumentFile = DocumentFile::find($documentFileId);
        $this->enterMode('display');
    }

    public function exitDocumentFileDisplay(): void
    {
        $this->displayingDocumentFile = null;
        $this->exitMode('display');
    }
}
