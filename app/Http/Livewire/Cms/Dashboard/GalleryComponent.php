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
        'exitCreate' => 'exitCreateMode',
        'updateGallery',
        'confirmDeleteGallery',
        'deleteGallery',
        'exitDelete' => 'exitDeleteMode',
        'exitUpdate' => 'exitUpdateMode',
        'displayGallery',
    ];

    public $modes = [
        'createMode' => false,
        'listMode' => false,
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

    public function exitCreateMode()
    {
        $this->modes['createMode'] = false;
    }

    public function enterUpdateMode()
    {
        $this->updateMode = true;
    }

    public function exitUpdateMode()
    {
        $this->updatingGallery = null;
        $this->updateMode = false;
    }

    public function updateGallery(Gallery $gallery)
    {
        $this->updatingGallery = $gallery;
        $this->enterUpdateMode();
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
        $this->enterDisplayMode();
    }
}
