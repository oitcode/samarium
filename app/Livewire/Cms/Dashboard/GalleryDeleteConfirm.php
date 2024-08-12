<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;

class GalleryDeleteConfirm extends Component
{
    public $deletingGallery;

    public function render()
    {
        return view('livewire.cms.dashboard.gallery-delete-confirm');
    }
}
