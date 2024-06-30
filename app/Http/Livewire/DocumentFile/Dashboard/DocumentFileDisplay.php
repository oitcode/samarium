<?php

namespace App\Http\Livewire\DocumentFile\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class DocumentFileDisplay extends Component
{
    use ModesTrait;

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
