<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\Traits\ModesTrait;

use App\Gallery;

class GalleryList extends Component
{
    use ModesTrait;
    use WithPagination;

    // public $galleries = null;

    public $deletingGallery;

    public $modes = [
        'delete' => false,
    ];

    protected $listeners = [
        'updateList' => 'render',
    ];

    public function render()
    {
        $galleries = Gallery::orderBy('gallery_id', 'DESC')->paginate(5);

        return view('livewire.cms.dashboard.gallery-list')
            ->with('galleries', $galleries);
    }
}
