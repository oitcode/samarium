<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;

class WebpageEditFeaturedImage extends Component
{
    use WithFileUploads;

    public $webpage;

    public $new_featured_image;

    public function render(): View
    {
        return view('livewire.cms.dashboard.webpage-edit-featured-image');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'new_featured_image' => 'required|image',
        ]);

        $featured_image_path = $this->new_featured_image->store('webpage-content', 'public');
        $this->webpage->featured_image_path = $featured_image_path;
        $this->webpage->save();

        $this->dispatch('webpageEditFeaturedImageCompleted');
    }
}
