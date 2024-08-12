<?php

namespace App\Livewire\Educ\Institution\Dashboard;

use Livewire\Component;

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

    public function render()
    {
        return view('livewire.educ.institution.dashboard.institution-display');
    }

    public function educInstitutionProgramCreateCancelled()
    {
        $this->exitMode('createEducInstitutionProgramMode');
    }

    public function educInstitutionProgramCreateCompleted()
    {
        $this->exitMode('createEducInstitutionProgramMode');
    }
}
