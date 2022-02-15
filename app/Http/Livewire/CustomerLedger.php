<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomerLedger extends Component
{
    public $customer;

    public function render()
    {
        return view('livewire.customer-ledger');
    }
}
