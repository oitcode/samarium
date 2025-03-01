<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductVendorDisplay extends Component
{
    public $productVendor;

    public function render(): View
    {
        return view('livewire.product-vendor.dashboard.product-vendor-display');
    }
}
