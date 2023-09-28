<?php

namespace App\Http\Livewire\Vacancy\Website;

use Livewire\Component;

class VacancyView extends Component
{
    public $vacancy;

    public function render()
    {
        return view('livewire.vacancy.website.vacancy-view');
    }
}
