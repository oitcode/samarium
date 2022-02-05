<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Customer;

class CustomerList extends Component
{
    public $customers;

    public function render()
    {
        $this->customers = Customer::all();

        return view('livewire.customer-list');
    }
}
