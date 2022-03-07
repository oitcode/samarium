<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Company;

class CompanyComponent extends Component
{
    use WithFileUploads;

    public $company = null;

    public $name;
    public $phone;
    public $email;
    public $address;
    public $pan_number;
    public $logo_image;

    public function render()
    {
        $this->company = Company::first();

        if ($this->company) {
            $this->name = $this->company->name;
            $this->phone = $this->company->phone;
            $this->email = $this->company->email;
            $this->address = $this->company->address;
            $this->pan_number = $this->company->pan_number;
        }

        return view('livewire.company-component');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'pan_number' => 'nullable',
            'logo_image' => 'image',
        ]);

        $imagePath = $this->logo_image->store('company', 'public');
        $validatedData['logo_image_path'] = $imagePath;

        Company::create($validatedData);

        $this->render();
    }
}
