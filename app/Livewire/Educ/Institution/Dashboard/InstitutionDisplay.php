<?php

namespace App\Livewire\Educ\Institution\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;

class InstitutionDisplay extends Component
{
    use ModesTrait;

    public $educInstitution;

    public $modes = [
        'createEducInstitutionProgramMode' => false,
    ];

    protected $listeners = [
        'educInstitutionProgramCreateCancelled',
        'educInstitutionProgramCreateCompleted',
    ];

    public function render(): View
    {
        return view('livewire.educ.institution.dashboard.institution-display');
    }

    public function educInstitutionProgramCreateCancelled(): void
    {
        $this->exitMode('createEducInstitutionProgramMode');
    }

    public function educInstitutionProgramCreateCompleted(): void
    {
        $this->exitMode('createEducInstitutionProgramMode');
    }
}
