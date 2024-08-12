<?php

namespace App\Livewire\UrlLink\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\UrlLink;

class UrlLinkCreate extends Component
{
    public $url;
    public $description;

    public function render()
    {
        return view('livewire.url-link.dashboard.url-link-create');
    }

    public function store()
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
