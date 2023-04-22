<?php

namespace App\Http\Livewire\Company\Dashboard;

use Livewire\Component;

class CompanyInfoUpdate extends Component
{
    public $companyInfo;

    public $info_key;
    public $info_value;

    public function mount()
    {
        $this->info_key = $this->companyInfo->info_key;
        $this->info_value = $this->companyInfo->info_value;
    }

    public function render()
    {
        return view('livewire.company.dashboard.company-info-update');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'info_key' => 'required',
            'info_value' => 'required',
        ]);

        $this->companyInfo->update($validatedData);

        $this->emit('companyInfoUpdateCompleted');
    }
}
