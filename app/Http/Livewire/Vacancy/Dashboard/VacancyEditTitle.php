<?php

namespace App\Http\Livewire\Vacancy\Dashboard;

use Livewire\Component;

class VacancyEditTitle extends Component
{
    public $vacancy;

    public $title;

    public function mount()
    {
        $this->title = $this->vacancy->title;
    }

    public function render()
    {
        return view('livewire.vacancy.dashboard.vacancy-edit-title');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required',
        ]);

        $this->vacancy->title = $validatedData['title'];
        $this->vacancy->save();

        $this->emit('vacancyUpdateTitleCompleted');
    }
}
