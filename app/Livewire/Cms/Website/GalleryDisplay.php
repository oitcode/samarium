<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;
use App\Gallery;

class GalleryDisplay extends Component
{
    public $galleries;

    public function render()
    {
        $this->galleries = Gallery::all();

        return view('livewire.cms.website.gallery-display');
    }
}
