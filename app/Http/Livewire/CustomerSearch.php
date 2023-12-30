<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Customer;

class CustomerSearch extends Component
{
    public $customer_search_name;

    public $customers;

    public function render()
    {
        return view('livewire.customer-search');
    }

    public function search()
    {
        $validatedData = $this->validate([
            'customer_search_name' => 'required',
        ]);

        $customers = Customer::where('name', 'like', '%'.$validatedData['customer_search_name'].'%')->get();

        $this->customers = $customers;
    }
}
