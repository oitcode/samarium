<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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
        'exitGalleryCreateMode',
    ];

    public $modes = [
        'createMode' => false,
        'updateMode' => false,
        'listMode' => true,
        'displayMode' => false,
    ];

    public function render(): View
    {
        return view('livewire.cms.dashboard.gallery-component');
    }

    public function enterCreateMode(): void
    {
        $this->createMode = true;
    }

    public function galleryAdded(): void
    {
        session()->flash('message', 'Gallery created');
        $this->modes['createMode'] = false;
    }

    public function enterUpdateMode(): void
    {
        $this->updateMode = true;
    }

    public function exitUpdateMode(): void
    {
        $this->updatingGallery = null;
        $this->exitMode('updateMode');
    }

    public function updateGallery(Gallery $gallery): void
    {
        $this->updatingGallery = $gallery;
        $this->enterMode('updateMode');
    }

    public function enterDeleteMode(): void
    {
        $this->deleteMode = true;
    }

    public function exitDeleteMode(): void
    {
        $this->deletingGallery = null;
        $this->deleteMode = false;
    }

    public function deleteGallery(Gallery $gallery): void
    {
        foreach ($gallery->galleryImages as $galleryImage) {
            $galleryImage->delete();
        }

        $gallery->delete();
        $this->exitDeleteMode();
        $this->dispatch('updateList');
    }

    public function confirmDeleteGallery(Gallery $gallery): void
    {
        $this->deletingGallery = $gallery;
        $this->enterDeleteMode();
    }

    public function enterDisplayMode(): void
    {
        $this->displayMode = true;
    }

    public function exitDisplayMode(): void
    {
        $this->displayingGallery = null;
        $this->displayMode = true;
    }

    public function displayGallery(int $galleryId): void
    {
        $this->displayingGallery = Gallery::find($galleryId);
        $this->enterMode('displayMode');
    }

    public function exitGalleryDisplayMode(): void
    {
        $this->displayingGallery = null;
        $this->clearModes();
    }

    public function exitGalleryCreateMode(): void
    {
        $this->clearModes();
    }
}
