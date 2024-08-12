<?php

namespace App\Livewire\DocumentFile\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
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

    public function render()
    {
        if (Gate::allows('view-document-file', $this->documentFile)) {
            return view('livewire.document-file.dashboard.document-file-display');
        } else {
            return '<div>You are not allowed to view this resource.</div>';
        }
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
