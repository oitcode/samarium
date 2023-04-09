<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\WebpageContent;

class WebpageContentCreateMediaAndText extends Component
{
    use WithFileUploads;

    public $webpage;

    public $image;
    public $paragraph;

    public $image_position = 'right';

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-content-create-media-and-text');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'image' => 'required|image',
            'paragraph' => 'required',
            'image_position' => 'required',
        ]);

        /* Save the image */
        $imagePath = $this->image->store('webpageContent', 'public');
        $validatedData['image_path'] = $imagePath;

        /* Prepare the content */
        $content = $this->prepareContent($validatedData);

        $webpageContent = new WebpageContent;

        $webpageContent->webpage_id = $this->webpage->webpage_id;
        $webpageContent->position = 0;
        $webpageContent->body = $content;
        $webpageContent->save();

        $this->emit('webpageContentCreateMediaAndTextCompleted');
    }

    /* Prepare the content */
    public function prepareContent($validatedData)
    {
        if ($this->image_position == 'left') {
            $content = '
            <div class="row">
              <div class="col-md-6">
                <img src="' . asset('storage/' . $validatedData['image_path']) . '" class="img-fluid">
              </div>
              <div class="col-md-6">
                <p>'
                . $validatedData['paragraph'] .
                '</p>
              </div>
            </div>';
        } else {
            $content = '
            <div class="row">
              <div class="col-md-6">
                <p>'
                . $validatedData['paragraph'] .
                '</p>
              </div>
              <div class="col-md-6">
                <img src="' . asset('storage/' . $validatedData['image_path']) . '" class="img-fluid">
              </div>
            </div>';
        }

        return $content;
    }
}
