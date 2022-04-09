<?php

namespace App\Http\Livewire\Ecs\Website;

use Livewire\Component;

use App\Gallery;

class GalleryDisplay extends Component
{
    public $galleries;

    public function render()
    {
        $this->galleries = Gallery::all();

        return view('livewire.ecs.website.gallery-display');
    }
}
