<?php

namespace App\Livewire\DocumentFile\Dashboard;

use Livewire\Component;
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

    public function render()
    {
        return view('livewire.document-file.dashboard.document-file-component');
    }

    public function documentFileCreateCancelled()
    {
        $this->exitMode('create');
    }

    public function documentFileCreateCompleted()
    {
        $this->exitMode('create');
    }

    public function pdfDisplayDocumentFile(DocumentFile $documentFile)
    {
        $this->pdfDisplayingDocumentFile = $documentFile;
        $this->enterMode('pdfDisplay');
    }

    public function displayDocumentFile(DocumentFile $documentFile)
    {
        $this->displayingDocumentFile = $documentFile;
        $this->enterMode('display');
    }

    public function exitDocumentFileDisplay()
    {
        $this->displayingDocumentFile = null;
        $this->exitMode('display');
    }
}
