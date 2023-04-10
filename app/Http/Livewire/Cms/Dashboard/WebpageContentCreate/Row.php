<?php

namespace App\Http\Livewire\Cms\Dashboard\WebpageContentCreate;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Traits\ModesTrait;

class Row extends Component
{
    use WithFileUploads;
    use ModesTrait;

    public $numOfRows = 2;

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-content-create.row');
    }
}
