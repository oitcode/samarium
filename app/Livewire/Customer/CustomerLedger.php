<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Illuminate\View\View;

class CustomerLedger extends Component
{
    public $customer;

    public function render(): View
    {
        return view('livewire.customer.customer-ledger');
    }
}
