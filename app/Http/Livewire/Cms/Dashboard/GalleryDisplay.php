<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

class GalleryDisplay extends Component
{
    public $gallery;

    public function render()
    {
        return view('livewire.cms.dashboard.gallery-display');
    }
}
