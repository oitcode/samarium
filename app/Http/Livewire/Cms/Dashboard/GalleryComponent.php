<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\Gallery;

class GalleryComponent extends Component
{
    use ModesTrait;

    public $createMode = false;
    public $displayMode = false;
    public $updateMode = false;
    public $deleteMode = false;

    public $displayingGallery;
    public $updatingGallery;
    public $deletingGallery;

    protected $listeners = [
        'galleryAdded',
        'updateGallery',
        'confirmDeleteGallery',
        'deleteGallery',
        'exitDelete' => 'exitDeleteMode',
        'exitUpdate' => 'exitUpdateMode',
        'displayGallery',
        'exitGalleryDisplayMode',
    ];

    public $modes = [
        'createMode' => false,
        'updateMode' => false,
        'listMode' => true,
        'displayMode' => false,
    ];

    public function render()
    {
        return view('livewire.cms.dashboard.gallery-component');
    }

    public function enterCreateMode()
    {
        $this->createMode = true;
    }

    public function galleryAdded()
    {
        session()->flash('message', 'Gallery created');
        $this->modes['createMode'] = false;
    }

    public function enterUpdateMode()
    {
        $this->updateMode = true;
    }

    public function exitUpdateMode()
    {
        $this->updatingGallery = null;
        $this->exitMode('updateMode');
    }

    public function updateGallery(Gallery $gallery)
    {
        $this->updatingGallery = $gallery;
        $this->enterMode('updateMode');
    }

    public function enterDeleteMode()
    {
        $this->deleteMode = true;
    }

    public function exitDeleteMode()
    {
        $this->deletingGallery = null;
        $this->deleteMode = false;
    }

    public function deleteGallery(Gallery $gallery)
    {
        foreach ($gallery->galleryImages as $galleryImage) {
            $galleryImage->delete();
        }

        $gallery->delete();
        $this->exitDeleteMode();
        $this->emit('updateList');
    }

    public function confirmDeleteGallery(Gallery $gallery)
    {
        $this->deletingGallery = $gallery;
        $this->enterDeleteMode();
    }

    public function enterDisplayMode()
    {
        $this->displayMode = true;
    }

    public function exitDisplayMode()
    {
        $this->displayingGallery = null;
        $this->displayMode = true;
    }

    public function displayGallery(Gallery $gallery)
    {
        $this->displayingGallery = $gallery;
        $this->enterMode('displayMode');
    }

    public function exitGalleryDisplayMode()
    {
        $this->displayingGallery = null;
        $this->clearModes();
    }
}
