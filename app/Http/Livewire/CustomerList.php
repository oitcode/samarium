<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Customer;

class CustomerList extends Component
{
    public $customers;

    public $customerSearch = [
        'name' => null,
        'phone' => null,
        'email' => null,
        'address' => null,
    ];

    public function mount()
    {
        $this->customers = Customer::all();
    }

    public function render()
    {
        return view('livewire.customer-list');
    }

    public function search()
    {
        $this->customers = Customer::where('address', 'like', '%'.$this->customerSearch['address'].'%')->get();
    }
}
