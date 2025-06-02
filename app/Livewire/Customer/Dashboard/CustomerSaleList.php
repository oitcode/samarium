<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class CustomerSaleList extends Component
{
    public $customer;
    public $saleInvoices;

    public function render(): View
    {
        $this->saleInvoices = $this->customer->saleInvoices()->orderBy('sale_invoice_id', 'DESC')->get();

        return view('livewire.customer.dashboard.customer-sale-list');
    }
}
