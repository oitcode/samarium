<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class CustomerSaleList extends Component
{
    public $customer;
    public $saleInvoices;

    public function render()
    {
        $this->saleInvoices = $this->customer->saleInvoices()->orderBy('sale_invoice_id', 'DESC')->get();

        return view('livewire.customer.customer-sale-list');
    }
}
