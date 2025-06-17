<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Cms\GalleryService;
use App\Models\Gallery\Gallery;

/**
 * GalleryList Component
 * 
 * This Livewire component handles the listing of galleries.
 */
class GalleryList extends Component
{
    use ModesTrait;
    use WithPagination;

    /**
     * Galleries per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of galleries
     *
     * @var int
     */
    public $totalGalleryCount;

    /**
     * Gallery which needs to be deleted
     *
     * @var Gallery
     */
    public $deletingGallery;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false,
        'cannotDelete' => false,
    ];

    /**
     * Component listeners
     *
     * @var array
     */
    protected $listeners = [
        'updateList' => 'render',
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(GalleryService $galleryService): View
    {
        $galleries = $galleryService->getPaginatedGalleries($this->perPage);
        $this->totalGalleryCount = $galleryService->getTotalGalleryCount();

        return view('livewire.cms.dashboard.gallery-list', [
            'galleries' => $galleries,
        ]);
    }

    /**
     * Confirm if user really wants to delete a gallery
     *
     * @return void
     */
    public function confirmDeleteGallery(int $gallery_id, GalleryService $galleryService): void
    {
        $this->deletingGallery = Gallery::find($gallery_id);

        if ($galleryService->canDeleteGallery($gallery_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel gallery delete
     *
     * @return void
     */
    public function cancelDeleteGallery(): void
    {
        $this->deletingGallery = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a gallery cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteGallery(): void
    {
        $this->deletingGallery = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete gallery
     *
     * @return void
     */
    public function deleteGallery(GalleryService $galleryService): void
    {
        $galleryService->deleteGallery($this->deletingGallery->gallery_id);
        $this->deletingGallery = null;
        $this->exitMode('confirmDelete');
    }
}
