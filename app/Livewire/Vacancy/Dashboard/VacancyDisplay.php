<?php

namespace App\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        return view('livewire.vacancy.dashboard.vacancy-display');
    }

    public function vacancyUpdateTitleCancelled(): void
    {
        $this->exitMode('updateTitleMode');
    }

    public function vacancyUpdateTitleCompleted(): void
    {
        $this->exitMode('updateTitleMode');
    }

    public function vacancyUpdateDescriptionCancelled(): void
    {
        $this->exitMode('updateDescriptionMode');
    }

    public function vacancyUpdateDescriptionCompleted(): void
    {
        $this->exitMode('updateDescriptionMode');
    }
}
