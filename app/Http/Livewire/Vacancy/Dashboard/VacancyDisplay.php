<?php

namespace App\Http\Livewire\Vacancy\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class VacancyDisplay extends Component
{
    use ModesTrait;

    public $vacancy;

    public $modes = [
        'updateTitleMode' => false,
    ];

    protected $listeners = [
        'vacancyUpdateTitleCancelled',
        'vacancyUpdateTitleCompleted',
    ];

    public function render()
    {
        return view('livewire.vacancy.dashboard.vacancy-display');
    }

    public function vacancyUpdateTitleCancelled()
    {
        $this->exitMode('updateTitleMode');
    }

    public function vacancyUpdateTitleCompleted()
    {
        $this->exitMode('updateTitleMode');
    }
}
