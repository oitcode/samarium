<?php

namespace App\Livewire\AppInfo\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Company;

class LvCompanyInfo extends Component
{
    public $company;

    public function render(): View
    {
        $this->company = Company::first();

        return view('livewire.app-info.dashboard.lv-company-info');
    }
}
