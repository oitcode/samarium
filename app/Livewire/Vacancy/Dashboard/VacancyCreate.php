<?php

namespace App\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use App\Vacancy;

class VacancyCreate extends Component
{
    public $title;
    public $description;
    public $job_location;

    public function render()
    {
        return view('livewire.vacancy.dashboard.vacancy-create');
    }

    public function store()
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
