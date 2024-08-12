<?php

namespace App\Livewire\Educ\Institution\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\EducInstitutionProgram;

class InstitutionProgramCreate extends Component
{
    public $educInstitution;

    public $name;
    public $program_type;

    public function render()
    {
        return view('livewire.educ.institution.dashboard.institution-program-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'program_type' => 'required',
        ]);

        $validatedData['educ_institution_id'] = $this->educInstitution->educ_institution_id;
        $validatedData['creator_id'] = Auth::id();

        EducInstitutionProgram::create($validatedData);
        $this->dispatch('educInstitutionProgramCreateCompleted');
    }
}
