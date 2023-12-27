<?php

namespace App\Http\Livewire\Vacancy\Dashboard;

use Livewire\Component;

class VacancyEditDescription extends Component
{
    public $vacancy;

    public $description;

    public function mount()
    {
        $this->description = $this->vacancy->description;
    }

    public function render()
    {
        return view('livewire.vacancy.dashboard.vacancy-edit-description');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'description' => 'required',
        ]);

        $this->vacancy->description = $validatedData['description'];
        $this->vacancy->save();

        $this->emit('vacancyUpdateDescriptionCompleted');
    }
}
