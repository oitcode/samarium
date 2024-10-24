<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;

use App\ProductVendor;

class ProductVendorList extends Component
{
    public $productVendors;

    public function render()
    {
        $this->productVendors = ProductVendor::all();

        return view('livewire.product-vendor.dashboard.product-vendor-list');
    }
}
