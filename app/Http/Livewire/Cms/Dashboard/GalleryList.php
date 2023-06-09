<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\Gallery;

class GalleryList extends Component
{
    use ModesTrait;

    public $galleries = null;

    public $deletingGallery;

    public $modes = [
        'delete' => false,
    ];

    protected $listeners = [
        'updateList' => 'render',
    ];

    public function render()
    {
        $this->galleries = Gallery::all();

        return view('livewire.cms.dashboard.gallery-list');
    }
}
