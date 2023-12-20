<?php

namespace App\Http\Livewire\Vacancy\Dashboard;

use Livewire\Component;

class VacancyDisplay extends Component
{
    public $vacancy;

    public function render()
    {
        return view('livewire.vacancy.dashboard.vacancy-display');
    }
}
