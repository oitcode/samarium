<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class CustomerLedger extends Component
{
    public $customer;

    public function render()
    {
        return view('livewire.customer.customer-ledger');
    }
}
