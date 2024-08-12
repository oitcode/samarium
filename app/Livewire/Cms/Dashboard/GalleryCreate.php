<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

use App\Gallery;
use App\GalleryImage;

class GalleryCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $comment;

    public $images = [];

    public function render()
    {
        return view('livewire.cms.dashboard.gallery-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'comment' => 'nullable',

            /* TODO: Show proper validation message */
            'images.*' => 'image'
        ]);

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

            DB::commit();

            /* Todo: Should this is outside the try block? */
            $this->dispatch('galleryAdded');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
