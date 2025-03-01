<?php

namespace App\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class VacancyEditDescription extends Component
{
    public $vacancy;

    public $description;

    public function mount(): void
    {
        $this->description = $this->vacancy->description;
    }

    public function render(): View
    {
        return view('livewire.vacancy.dashboard.vacancy-edit-description');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'description' => 'required',
        ]);

        $this->vacancy->description = $validatedData['description'];
        $this->vacancy->save();

        $this->dispatch('vacancyUpdateDescriptionCompleted');
    }
}
