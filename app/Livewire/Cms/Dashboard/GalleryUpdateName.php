<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;

class GalleryUpdateName extends Component
{
    public $gallery;

    public $name;

    public function mount()
    {
        $this->name = $this->gallery->name;
    }

    public function render()
    {
        return view('livewire.cms.dashboard.gallery-update-name');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->gallery->name = $validatedData['name'];
        $this->gallery->save();

        $this->dispatch('updateGalleryNameCompleted');
    }
}
