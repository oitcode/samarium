<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\ModesTrait;
use App\Services\Cms\GalleryService;
use App\GalleryImage;

class ProductGalleryDisplay extends Component
{
    use ModesTrait;
    use WithFileUploads;

    public $product;

    public $new_images = [];

    public $modes = [
        'addImages' => false,
    ];

    protected $listeners = [
        'addProductGalleryImagesCompleted',
        'addProductGalleryImagesCancelled',
    ];

    public function render(): View
    {
        return view('livewire.product.dashboard.product-gallery-display');
    }

    public function deleteImageFromGallery(int $galleryImageId, GalleryService $galleryService): void
    {
        $galleryService->deleteImageFromGallery($galleryImageId);

        $this->product = $this->product->fresh();
    }

    public function addNewImages(): void
    {
        $validatedData = $this->validate([
            /* TODO: Show proper validation message */
            'new_images.*' => 'image',
        ]);

        $i = $this->product->gallery->getHighestPosition() + 1;

        foreach ($this->new_images as $image) {
            $imagePath = $image->store('gallery_image', 'public');

            $galleryImage = new GalleryImage;
            $galleryImage->gallery_id = $this->product->gallery->gallery_id;
            $galleryImage->image_path = $imagePath;
            $galleryImage->position = $i;

            $galleryImage->save();

            $i++;
        }

        $this->dispatch('addProductGalleryImagesCompleted');
    }

    public function movePositionUp(int $galleryImageId, GalleryService $galleryService): void
    {
        $galleryImage = GalleryImage::find($galleryImageId);
        $previousImage = $galleryService->getPreviousImage($galleryImage->gallery_image_id);

        if ($previousImage) {
            $temp = $previousImage->position;
            $previousImage->position = $galleryImage->position;
            $galleryImage->position = $temp;

            $previousImage->save();
            $galleryImage->save();

            $this->render();
        }
    }

    public function movePositionDown(int $galleryImageId, GalleryService $galleryService): void
    {
        $galleryImage = GalleryImage::find($galleryImageId);
        $nextImage = $galleryService->getNextImage($galleryImage->gallery_image_id);

        if ($nextImage) {
            $temp = $nextImage->position;
            $nextImage->position = $galleryImage->position;
            $galleryImage->position = $temp;

            $nextImage->save();
            $galleryImage->save();

            $this->render();
        }
    }

    public function addProductGalleryImagesCompleted()
    {
        $this->exitMode('addImages');
    }

    public function addProductGalleryImagesCancelled()
    {
        $this->exitMode('addImages');
    }
}
