<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;

class WebpageEditVisibility extends Component
{
    public $webpage;

    public $visibility;

    public function mount()
    {
        $this->visibility = $this->webpage->visibility;
    }

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-edit-visibility');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'visibility' => ['required', 'regex:/^(private)|(public)$/',],
        ]);

        $this->webpage->update($validatedData);
        $this->dispatch('webpageEditVisibilityCompleted');
    }
}
