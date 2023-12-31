<?php

namespace App\Http\Livewire\DocumentFile\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;


class DocumentFileComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'delete' => false,
        'search' => false,
    ];

    protected $listeners = [
    ];

    public function render()
    {
        return view('livewire.document-file.dashboard.document-file-component');
    }
}
