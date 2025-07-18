<?php

namespace App\Livewire\Vacancy\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Vacancy\Vacancy;

class VacancyComponent extends Component
{
    use ModesTrait;

    public $displayingVacancy;

    public $modes = [
        'createMode' => false,
        'listMode' => true,
        'displayMode' => false,
        'updateMode' => false,
    ];

    protected $listeners = [
        'vacancyCreateCompleted',
        'vacancyCreateCancelled',
        'displayVacancy',
        'exitVacancyDisplay',
    ];

    public function render(): View
    {
        return view('livewire.vacancy.dashboard.vacancy-component');
    }

    public function vacancyCreateCompleted(): void
    {
        $this->exitMode('createMode');
    }

    public function vacancyCreateCancelled(): void
    {
        $this->exitMode('createMode');
    }

    public function displayVacancy(int $vacancyId): void
    {
        $this->displayingVacancy = Vacancy::find($vacancyId);

        $this->enterMode('displayMode');
    }

    public function exitVacancyDisplay(): void
    {
        $this->displayingVacancy = null;
        $this->exitMode('displayMode');
    }
}
