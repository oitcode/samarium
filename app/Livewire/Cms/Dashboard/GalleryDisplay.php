<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use App\Traits\ModesTrait;
use App\GalleryImage;

class GalleryDisplay extends Component
{
    use ModesTrait;

    public $gallery;

    public $modes = [
        'updateGalleryNameMode' => false,
        'addGalleryImagesMode' => false,
        'updateShowInGalleryPageMode' => false,
    ];

    protected $listeners = [
        'updateGalleryNameCancel',
        'updateGalleryNameCompleted',
        'galleryImagesAdded',
        'addGalleryImagesCancelled',
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

    public function movePositionUp(GalleryImage $galleryImage)
    {
        $previousImage = $this->getPreviousImage($galleryImage);

        if ($previousImage) {
            $temp = $previousImage->position;
            $previousImage->position = $galleryImage->position;
            $galleryImage->position = $temp;

            $previousImage->save();
            $galleryImage->save();

            $this->render();
        }
    }

    public function movePositionDown(GalleryImage $galleryImage)
    {
        $nextImage = $this->getNextImage($galleryImage);

        if ($nextImage) {
            $temp = $nextImage->position;
            $nextImage->position = $galleryImage->position;
            $galleryImage->position = $temp;

            $nextImage->save();
            $galleryImage->save();

            $this->render();
        }
    }

    public function getPreviousImage(GalleryImage $galleryImage)
    {
        $previousItem = $galleryImage->gallery
            ->galleryImages()->where('position', '<', $galleryImage->position)
            ->orderBy('position', 'desc')
            ->first();

        return $previousItem;
    }

    public function getNextImage(GalleryImage $galleryImage)
    {
        $nextItem = $galleryImage->gallery
            ->galleryImages()->where('position', '>', $galleryImage->position)
            ->orderBy('position', 'asc')
            ->first();

        return $nextItem;
    }

    public function galleryImagesAdded()
    {
        $this->exitMode('addGalleryImagesMode');
    }

    public function addGalleryImagesCancelled()
    {
        $this->exitMode('addGalleryImagesMode');
    }

    public function toggleGalleryPageVisibility()
    {
        if ($this->gallery->show_in_gallery_page == 'yes') {
            $this->gallery->show_in_gallery_page = 'no';
        } else {
            $this->gallery->show_in_gallery_page = 'yes';
        }

        $this->gallery->save();
        $this->render();
    }
}
