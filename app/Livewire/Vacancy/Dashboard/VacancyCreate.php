<?php

namespace App\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Vacancy;

class VacancyCreate extends Component
{
    public $title;
    public $description;
    public $job_location;

    public function render(): View
    {
        return view('livewire.vacancy.dashboard.vacancy-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'job_location' => 'required',
            'description' => 'required',
        ]);

        $validatedData['status'] = 'Open';

        Vacancy::create($validatedData);

        $this->dispatch('vacancyCreateCompleted');
    }
}
