<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Gallery;

class GalleryDisplay extends Component
{
    public $galleries;

    public function render(): View
    {
        $this->galleries = Gallery::all();

        return view('livewire.cms.website.gallery-display');
    }
}
