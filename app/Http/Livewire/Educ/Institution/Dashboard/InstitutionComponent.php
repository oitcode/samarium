<?php

namespace App\Http\Livewire\Educ\Institution\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

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
    ];

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
}
