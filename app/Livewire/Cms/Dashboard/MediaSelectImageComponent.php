<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use App\Traits\ModesTrait;
use App\GalleryImage;

class MediaSelectImageComponent extends Component
{
    use ModesTrait;

    public $imageSelected;
    public $galleryImages;

    public $modes = [
        'imageSelectedMode' => false,
    ];

    public function render()
    {
        $this->galleryImages = GalleryImage::all();
        return view('livewire.cms.dashboard.media-select-image-component');
    }

    public function selectImage(GalleryImage $galleryImage)
    {
        $this->imageSelected = $galleryImage;
        $this->enterMode('imageSelectedMode');
        $this->dispatch('mediaImageSelected', $galleryImage);
    }
}
