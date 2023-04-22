<?php

namespace App\Http\Livewire\Company\Dashboard;

use Livewire\Component;

use App\Company;
use App\CompanyInfo;

class CompanyInfoCreate extends Component
{
    public $company;

    public $info_key;
    public $info_value;

    public function render()
    {
        return view('livewire.company.dashboard.company-info-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'info_key' => 'required|string|max:100',
            'info_value' => 'required|string|max:100',
        ]);

        $validatedData['company_id'] = $this->company->company_id;

        CompanyInfo::create($validatedData);

        $this->emit('companyInfoCreateCompleted');
    }
}
