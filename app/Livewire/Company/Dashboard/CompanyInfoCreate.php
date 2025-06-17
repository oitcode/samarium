<?php

namespace App\Livewire\Company\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Models\Company\Company;
use App\Models\Company\CompanyInfo;

class CompanyInfoCreate extends Component
{
    use WithFileUploads;

    public $company;

    public $info_key;
    public $info_value;
    public $image;

    public function render(): View
    {
        return view('livewire.company.dashboard.company-info-create');
    }

    public function store(): void
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
