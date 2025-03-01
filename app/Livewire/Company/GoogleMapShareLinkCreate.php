<?php

namespace App\Livewire\Company;

use Livewire\Component;
use Illuminate\View\View;

class GoogleMapShareLinkCreate extends Component
{
    public $company;

    public $google_map_share_link;

    public function render(): View
    {
        return view('livewire.company.google-map-share-link-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'google_map_share_link' => 'required',
        ]);

        $this->company->google_map_share_link = $validatedData['google_map_share_link'];
        $this->company->save();

        $this->dispatch('googleMapShareLinkCreateCompleted');
    }
}
