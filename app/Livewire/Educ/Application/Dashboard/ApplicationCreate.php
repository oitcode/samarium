<?php

namespace App\Livewire\Educ\Application\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\EducInstitution\EducInstitution;
use App\Models\EducInstitution\EducInstitutionProgram;
use App\Models\EducInstitution\EducApplication;

class ApplicationCreate extends Component
{
    public $customer; 

    public $educ_institution_id;
    public $educ_institution_program_id;

    public $educInstitutions;
    public $selectedEducInstitution = null;

    public function render(): View
    {
        $this->educInstitutions = EducInstitution::all();

        return view('livewire.educ.application.dashboard.application-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'educ_institution_program_id' => 'required',
        ]);

        $validatedData['status'] = 'new';

        $validatedData['customer_id'] = $this->customer->customer_id;
        $validatedData['creator_id'] = Auth::id();

        EducApplication::create($validatedData);

        $this->dispatch('educApplicationCreateCompleted');
    }

    public function selectEducInstitution(): void
    {
        $this->selectedEducInstitution = EducInstitution::find($this->educ_institution_id);
    }
}
