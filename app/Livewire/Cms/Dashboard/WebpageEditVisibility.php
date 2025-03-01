<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class WebpageEditVisibility extends Component
{
    public $webpage;

    public $visibility;

    public function mount(): void
    {
        $this->visibility = $this->webpage->visibility;
    }

    public function render(): View
    {
        return view('livewire.cms.dashboard.webpage-edit-visibility');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'visibility' => ['required', 'regex:/^(private)|(public)$/',],
        ]);

        $this->webpage->update($validatedData);
        $this->dispatch('webpageEditVisibilityCompleted');
    }
}
