<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Services\Cms\GalleryService;
use App\GalleryImage;

class ProductGalleryAddImages extends Component
{
    use WithFileUploads;

    public $gallery;

    public $new_images = [];

    public function render()
    {
        return view('livewire.product.dashboard.product-gallery-add-images');
    }

    public function addNewImages(): void
    {
        $validatedData = $this->validate([
            /* TODO: Show proper validation message */
            'new_images.*' => 'image',
        ]);

        $i = $this->gallery->getHighestPosition() + 1;

        foreach ($this->new_images as $image) {
            $imagePath = $image->store('gallery_image', 'public');

            $galleryImage = new GalleryImage;
            $galleryImage->gallery_id = $this->gallery->gallery_id;
            $galleryImage->image_path = $imagePath;
            $galleryImage->position = $i;
            $galleryImage->save();

            $i++;
        }

        $this->dispatch('addProductGalleryImagesCompleted');
    }
}
