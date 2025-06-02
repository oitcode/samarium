<?php

namespace App\Livewire\Company\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class BriefDescriptionCreate extends Component
{
    public $company;

    public $brief_description;

    public function render(): View
    {
        return view('livewire.company.dashboard.brief-description-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'brief_description' => 'required',
        ]);


        $this->company->brief_description = $validatedData['brief_description'];
        $this->company->save();

        $this->dispatch('briefDescriptionCreateCompleted');
    }
}
