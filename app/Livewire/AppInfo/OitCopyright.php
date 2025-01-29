<?php

namespace App\Livewire\AppInfo;

use Livewire\Component;

use App\Company;

class OitCopyright extends Component
{
    public $company;

    public function render()
    {
        $this->company = Company::first();

        return view('livewire.app-info.oit-copyright');
    }
}
