<?php

namespace App\Livewire\Company\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class BriefDescriptionEdit extends Component
{
    public $company;

    public $brief_description;

    public function mount(): void
    {
        $this->brief_description = $this->company->brief_description;
    }

    public function render(): View
    {
        return view('livewire.company.dashboard.brief-description-edit');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'brief_description' => 'required',
        ]);


        $this->company->brief_description = $validatedData['brief_description'];
        $this->company->save();

        $this->dispatch('briefDescriptionEditCompleted');
    }
}
