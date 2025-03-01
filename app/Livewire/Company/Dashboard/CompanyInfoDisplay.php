<?php

namespace App\Livewire\Company\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\CompanyInfo;

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

    public function render(): View
    {
        return view('livewire.company.dashboard.company-info-display');
    }

    public function companyInfoUpdateCancelled(): void
    {
        $this->exitMode('editMode');
    }

    public function companyInfoUpdateCompleted(): void
    {
        $this->exitMode('editMode');
    }

    public function deleteCompanyInfo(CompanyInfo $companyInfo): void
    {
        $companyInfo->delete();
        $this->dispatch('companyInfoDeleted');
    }
}
