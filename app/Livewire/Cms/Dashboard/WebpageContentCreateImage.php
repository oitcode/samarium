<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\WebpageContent;

class WebpageContentCreateImage extends Component
{
    use WithFileUploads;

    public $webpage;

    public $image;

    public function render(): View
    {
        return view('livewire.cms.dashboard.webpage-content-create-image');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'image' => 'required|image',
        ]);

        /* Save the image */
        $imagePath = $this->image->store('webpageContent', 'public');
        $validatedData['image_path'] = $imagePath;

        /* Prepare the content */
        $content = $this->prepareContent($validatedData);

        $webpageContent = new WebpageContent;

        $webpageContent->webpage_id = $this->webpage->webpage_id;
        $webpageContent->position = $this->webpage->getHighestContentPosition() + 1;
        $webpageContent->body = $content;
        $webpageContent->save();

        $this->dispatch('webpageContentCreateImageCompleted');
    }

    /* Prepare the content */
    public function prepareContent($validatedData): string
    {
        $content = '
            <div class="container">
                <img src="' . asset('storage/' . $validatedData['image_path']) . '" class="img-fluid">
            </div>';

        return $content;
    }
}
