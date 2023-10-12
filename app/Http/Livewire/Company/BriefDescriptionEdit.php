<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;

class BriefDescriptionEdit extends Component
{
    public $company;

    public $brief_description;

    public function mount()
    {
        $this->brief_description = $this->company->brief_description;
    }

    public function render()
    {
        return view('livewire.company.brief-description-edit');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'brief_description' => 'required',
        ]);


        $this->company->brief_description = $validatedData['brief_description'];
        $this->company->save();

        $this->emit('briefDescriptionEditCompleted');
    }
}
