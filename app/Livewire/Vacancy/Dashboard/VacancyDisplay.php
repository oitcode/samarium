<?php

namespace App\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use App\Traits\ModesTrait;

class VacancyDisplay extends Component
{
    use ModesTrait;

    public $vacancy;

    public $modes = [
        'updateTitleMode' => false,
        'updateDescriptionMode' => false,
    ];

    protected $listeners = [
        'vacancyUpdateTitleCancelled',
        'vacancyUpdateTitleCompleted',
        'vacancyUpdateDescriptionCancelled',
        'vacancyUpdateDescriptionCompleted',
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

    public function vacancyUpdateDescriptionCancelled()
    {
        $this->exitMode('updateDescriptionMode');
    }

    public function vacancyUpdateDescriptionCompleted()
    {
        $this->exitMode('updateDescriptionMode');
    }
}
