<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\WebpageContent;

class WebpageDisplayWebpageContentCreate extends Component
{
    use WithFileUploads;

    public $webpage;

    public $body;
    public $image;

    public function render()
    {
        return view('livewire.cms.webpage-display-webpage-content-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'body' => 'required',
            'image' => 'image',
        ]);

        $imagePath = $this->image->store('webpageContent', 'public');
        $validatedData['image_path'] = $imagePath;
        $validatedData['webpage_id'] = $this->webpage->webpage_id;

        WebpageContent::create($validatedData);

        $this->emit('webpageContentAdded');
    }
}
