<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\GalleryImage;

class GalleryDisplay extends Component
{
    use ModesTrait;

    public $gallery;

    public $modes = [
        'updateGalleryNameMode' => false,
    ];

    protected $listeners = [
        'updateGalleryNameCancel',
        'updateGalleryNameCompleted',
    ];

    public function render()
    {
        return view('livewire.cms.dashboard.gallery-display');
    }

    public function deleteImageFromGallery(GalleryImage $galleryImage)
    {
        $galleryImage->delete();
        $this->gallery = $this->gallery->fresh();
        $this->render();
    }

    public function updateGalleryNameCancel()
    {
        $this->exitMode('updateGalleryNameMode');
    }

    public function updateGalleryNameCompleted()
    {
        session()->flash('message', 'Gallery name updated');
        $this->exitMode('updateGalleryNameMode');
    }
}
