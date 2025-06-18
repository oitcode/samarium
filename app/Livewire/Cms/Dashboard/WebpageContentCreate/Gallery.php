<?php

namespace App\Livewire\Cms\Dashboard\WebpageContentCreate;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Gallery\Gallery as CmsGallery;
use App\Models\Cms\Webpage\WebpageContent;

class Gallery extends Component
{
    public $webpage;

    public $gallery_id;
    public $galleries;

    public function render(): View
    {
        $this->galleries = CmsGallery::all();
        return view('livewire.cms.dashboard.webpage-content-create.gallery');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            /* Todo: Validate that this id actually exists. */
            'gallery_id' => 'required|integer',
        ]);

        /* Prepare the content */
        $content = $this->prepareContent($validatedData);

        $webpageContent = new WebpageContent;

        $webpageContent->webpage_id = $this->webpage->webpage_id;
        $webpageContent->position = $this->webpage->getHighestContentPosition() + 1;
        $webpageContent->body = $content;
        $webpageContent->save();

        $this->dispatch('webpageContentCreateGalleryCompleted');
    }

    /* Prepare the content */
    public function prepareContent($validatedData): string
    {
        $gallery = CmsGallery::find($validatedData['gallery_id']);

        $content = '<div class="row">';

        foreach ($gallery->galleryImages as $galleryImage) {
            $content = $content . '
                <div class="col-md-3">
                  <img src="' . asset('storage/' . $galleryImage->image_path) . '" class="img-fluid">
                </div>
            ';
        }

        $content = $content . '</div>';

        return $content;
    }
}
