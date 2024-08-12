<?php

namespace App\Livewire\Company;

use Livewire\Component;

class BriefDescriptionCreate extends Component
{
    public $company;

    public $brief_description;

    public function render()
    {
        return view('livewire.company.brief-description-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'brief_description' => 'required',
        ]);


        $this->company->brief_description = $validatedData['brief_description'];
        $this->company->save();

        $this->dispatch('briefDescriptionCreateCompleted');
    }
}
