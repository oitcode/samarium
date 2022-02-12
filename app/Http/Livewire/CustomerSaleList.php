<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomerSaleList extends Component
{
    public $customer;
    public $saleInvoices;

    public function render()
    {
        $this->saleInvoices = $this->customer->saleInvoices;

        return view('livewire.customer-sale-list');
    }
}
