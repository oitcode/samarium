<?php

namespace App\Livewire\Educ\Institution\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\EducInstitution;

class InstitutionCreate extends Component
{
    public $name;
    public $country;
    public $institution_type;

    public function render()
    {
        return view('livewire.educ.institution.dashboard.institution-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'country' => 'required',
            'institution_type' => 'required',
        ]);

        /* User which created this record. */
        $validatedData['creator_id'] = Auth::user()->id;

        EducInstitution::create($validatedData);

        $this->dispatch('educInstitutionCreateCompleted');
    }
}
