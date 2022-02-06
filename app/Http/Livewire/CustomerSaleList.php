<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomerSaleList extends Component
{
    public $customer;
    public $sales;

    public function render()
    {
        $this->sales = $this->customer->sales;

        return view('livewire.customer-sale-list');
    }
}
