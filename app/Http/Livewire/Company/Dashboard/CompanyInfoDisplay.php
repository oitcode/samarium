<?php

namespace App\Http\Livewire\Company\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class CompanyInfoDisplay extends Component
{
    use ModesTrait;

    public $companyInfo; 

    public $modes = [
        'editMode' => false,
    ];

    protected $listeners = [
        'companyInfoUpdateCancelled',
        'companyInfoUpdateCompleted',
    ];

    public function render()
    {
        return view('livewire.company.dashboard.company-info-display');
    }

    public function companyInfoUpdateCancelled()
    {
        $this->exitMode('editMode');
    }

    public function companyInfoUpdateCompleted()
    {
        $this->exitMode('editMode');
    }
}
