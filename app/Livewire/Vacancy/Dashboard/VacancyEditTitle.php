<?php

namespace App\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class VacancyEditTitle extends Component
{
    public $vacancy;

    public $title;

    public function mount(): void
    {
        $this->title = $this->vacancy->title;
    }

    public function render(): View
    {
        return view('livewire.vacancy.dashboard.vacancy-edit-title');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'title' => 'required',
        ]);

        $this->vacancy->title = $validatedData['title'];
        $this->vacancy->save();

        $this->dispatch('vacancyUpdateTitleCompleted');
    }
}
