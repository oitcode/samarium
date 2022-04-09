<?php

namespace App\Http\Livewire\Ecs;

use Livewire\Component;

use App\Company;

class ContactComponent extends Component
{
    public $company;

    public function render()
    {
        $this->company = Company::first();
        return view('livewire.ecs.contact-component');
    }
}
