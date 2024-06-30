<?php

namespace App\Http\Livewire\DocumentFile\Dashboard;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Traits\ModesTrait;

class DocumentFileDisplay extends Component
{
    use ModesTrait;
    use AuthorizesRequests;

    public $documentFile;


    public $modes = [
        'updateNameMode' => false,
        'updateDescriptionMode' => false,

        'editUserGroupMode' => false,
    ];

    protected $listeners = [
        'documentFileEditUserGroupCancel',
        'documentFileEditUserGroupCompleted',
    ];

    public function mount()
    {
        $this->authorize('view-document-file', $this->documentFile);
    }

    public function render()
    {
        return view('livewire.document-file.dashboard.document-file-display');
    }

    public function documentFileEditUserGroupCancel()
    {
        $this->exitMode('editUserGroupMode');
    }

    public function documentFileEditUserGroupCompleted()
    {
        $this->exitMode('editUserGroupMode');
    }
}
