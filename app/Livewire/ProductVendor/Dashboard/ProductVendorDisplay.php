<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;

class ProductVendorDisplay extends Component
{
    public $productVendor;

    public function render()
    {
        return view('livewire.product-vendor.dashboard.product-vendor-display');
    }
}
