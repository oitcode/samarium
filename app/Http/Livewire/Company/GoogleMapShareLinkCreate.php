<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;

class GoogleMapShareLinkCreate extends Component
{
    public $company;

    public $google_map_share_link;

    public function render()
    {
        return view('livewire.company.google-map-share-link-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'google_map_share_link' => 'required',
        ]);

        $this->company->google_map_share_link = $validatedData['google_map_share_link'];
        $this->company->save();

        $this->emit('googleMapShareLinkCreateCompleted');
    }
}
