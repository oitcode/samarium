<?php

namespace App\Livewire\UrlLink\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\UrlLink\UrlLink;

class UrlLinkCreate extends Component
{
    public $url;
    public $description;

    public function render(): View
    {
        return view('livewire.url-link.dashboard.url-link-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'url' => 'required',
            'description' => 'required',
        ]);

        /* User which created this record. */
        $validatedData['creator_id'] = Auth::user()->id;

        UrlLink::create($validatedData);

        $this->dispatch('urlLinkCreateCompleted');
    }
}
