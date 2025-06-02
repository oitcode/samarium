<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class CustomerLedger extends Component
{
    public $customer;

    public function render(): View
    {
        return view('livewire.customer.dashboard.customer-ledger');
    }
}
