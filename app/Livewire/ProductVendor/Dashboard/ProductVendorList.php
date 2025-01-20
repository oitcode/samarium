<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\ProductVendor;

class ProductVendorList extends Component
{
    use WithPagination;

    // public $productVendors;

    public function render()
    {
        $productVendors = ProductVendor::orderBy('product_vendor_id', 'DESC')->paginate(5);

        return view('livewire.product-vendor.dashboard.product-vendor-list')
            ->with('productVendors', $productVendors);
    }
}
