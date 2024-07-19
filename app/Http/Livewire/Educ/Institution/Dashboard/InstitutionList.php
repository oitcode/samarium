<?php

namespace App\Http\Livewire\Educ\Institution\Dashboard;

use Livewire\Component;

use App\EducInstitution;

class InstitutionList extends Component
{
    public $educInstitutions;

    public function render()
    {
        $this->educInstitutions = EducInstitution::all();

        return view('livewire.educ.institution.dashboard.institution-list');
    }
}
