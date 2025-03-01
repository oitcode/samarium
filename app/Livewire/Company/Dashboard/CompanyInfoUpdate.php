<?php

namespace App\Livewire\Company\Dashboard;

use Livewire\Component;

class CompanyInfoUpdate extends Component
{
    public $companyInfo;

    public $info_key;
    public $info_value;

    public function mount(): void
    {
        $this->info_key = $this->companyInfo->info_key;
        $this->info_value = $this->companyInfo->info_value;
    }

    public function render(): View
    {
        return view('livewire.company.dashboard.company-info-update');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'info_key' => 'required',
            'info_value' => 'required',
        ]);

        $this->companyInfo->update($validatedData);

        $this->dispatch('companyInfoUpdateCompleted');
    }
}
