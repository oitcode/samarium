<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;

class GalleryUpdateName extends Component
{
    public $gallery;

    public $name;

    public function mount(): void
    {
        $this->name = $this->gallery->name;
    }

    public function render(): View
    {
        return view('livewire.cms.dashboard.gallery-update-name');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->gallery->name = $validatedData['name'];
        $this->gallery->save();

        $this->dispatch('updateGalleryNameCompleted');
    }
}
