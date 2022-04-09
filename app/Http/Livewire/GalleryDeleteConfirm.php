<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GalleryDeleteConfirm extends Component
{
    public $deletingGallery;

    public function render()
    {
        return view('livewire.gallery-delete-confirm');
    }
}
