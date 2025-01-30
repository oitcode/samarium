<?php

namespace App\Livewire\Company\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Company;
use App\CompanyInfo;

class CompanyInfoCreate extends Component
{
    use WithFileUploads;

    public $company;

    public $info_key;
    public $info_value;
    public $image;

    public function render()
    {
        return view('livewire.company.dashboard.company-info-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'info_key' => 'required|string|max:100',
            'info_value' => 'required|string|max:100',
            'image' => 'nullable|image',
        ]);

        $validatedData['company_id'] = $this->company->company_id;

        if ($this->image !== null) {
            $imagePath = $this->image->store('companyInfo', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        CompanyInfo::create($validatedData);

        $this->dispatch('companyInfoCreateCompleted');
    }
}
