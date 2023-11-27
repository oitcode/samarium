<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Company;

class LvCompanyInfo extends Component
{
    public $company;

    public function render()
    {
        $this->company = Company::first();

        return view('livewire.lv-company-info');
    }
}
