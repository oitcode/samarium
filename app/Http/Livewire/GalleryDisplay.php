<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GalleryDisplay extends Component
{
    public $gallery;

    public function render()
    {
        return view('livewire.gallery-display');
    }
}
