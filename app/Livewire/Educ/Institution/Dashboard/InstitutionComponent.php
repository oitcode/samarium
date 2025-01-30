<?php

namespace App\Livewire\Educ\Institution\Dashboard;

use Livewire\Component;
use App\Traits\ModesTrait;
use App\EducInstitution;

class InstitutionComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'create' => false,
        'list' => true,
        'display' => false,
        'delete' => false,
        'search' => false,
    ];

    protected $listeners = [
        'educInstitutionCreateCancelled',
        'educInstitutionCreateCompleted',

        'displayEducInstitution',
        'exitEducInstitutionDisplay',
    ];

    public $displayingEducInstitution;


    public function render()
    {
        return view('livewire.educ.institution.dashboard.institution-component');
    }

    public function educInstitutionCreateCancelled()
    {
        $this->exitMode('create');
    }

    public function educInstitutionCreateCompleted()
    {
        $this->exitMode('create');
    }

    public function displayEducInstitution(EducInstitution $educInstitution)
    {
        $this->displayingEducInstitution = $educInstitution;
        $this->enterMode('display');
    }

    public function exitEducInstitutionDisplay()
    {
        $this->displayingEducInstitution = null;
        $this->exitMode('display');
    }
}
