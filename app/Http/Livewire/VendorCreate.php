<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Vendor;

class VendorCreate extends Component
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $pan_num;

    public function render()
    {
        return view('livewire.vendor-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable',
            'address' => 'nullable',
            'pan_num' => 'nullable',
        ]);

        Vendor::create($validatedData);

        $this->emit('clearModes');
    }
}
