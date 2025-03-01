<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class GalleryDeleteConfirm extends Component
{
    public $deletingGallery;

    public function render(): View
    {
        return view('livewire.cms.dashboard.gallery-delete-confirm');
    }
}
