<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Customer;

class CustomerCreate extends Component
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $pan_num;

    public function render()
    {
        return view('livewire.customer-create');
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

        Customer::create($validatedData);

        $this->emit('clearModes');
    }
}
