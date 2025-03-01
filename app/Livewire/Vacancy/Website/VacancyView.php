<?php

namespace App\Livewire\Vacancy\Website;

use Livewire\Component;
use Illuminate\View\View;

class VacancyView extends Component
{
    public $vacancy;

    public function render(): View
    {
        return view('livewire.vacancy.website.vacancy-view');
    }
}
