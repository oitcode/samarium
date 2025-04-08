<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Illuminate\View\View;
use App\Customer;

class CustomerSearch extends Component
{
    public $customer_search_name;

    public $customers;
    public $searchDone = false;

    public function render(): View
    {
        return view('livewire.customer.customer-search');
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'customer_search_name' => 'required',
        ]);

        $customers = Customer::where('name', 'like', '%'.$validatedData['customer_search_name'].'%')->get();

        $this->customers = $customers;

        $this->searchDone = true;
    }
}
