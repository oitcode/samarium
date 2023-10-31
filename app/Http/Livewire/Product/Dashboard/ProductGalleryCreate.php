<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

use App\GalleryImage;
use App\Gallery;

class ProductGalleryCreate extends Component
{
    use WithFileUploads;

    public $product;

    public $images = [];

    public function render()
    {
        return view('livewire.product.dashboard.product-gallery-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            /* TODO: Show proper validation message */
            'images.*' => 'image',
        ]);

        $validatedData['name'] = $this->product->name . ' - Gallery';
        $validatedData['description'] = $this->product->name . ' - Gallery';

        DB::beginTransaction();

        try {
            $gallery = Gallery::create($validatedData);

            $i = 0;
            foreach ($this->images as $image) {
                $imagePath = $image->store('gallery_image', 'public');

                $galleryImage = new GalleryImage;

                $galleryImage->gallery_id = $gallery->gallery_id;
                $galleryImage->image_path = $imagePath;
                $galleryImage->position = $i;

                $galleryImage->save();

                $i++;
            }

            $this->product->gallery_id = $gallery->gallery_id;
            $this->product->save();

            DB::commit();

            /* Todo: Should this is outside the try block? */
            $this->emit('createProductGalleryCompleted');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
