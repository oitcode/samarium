<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\ProductVendor;

class ProductVendorList extends Component
{
    use WithPagination;

    // public $productVendors;
    public $totalProductVendorCount;

    public function render(): View
    {
        $productVendors = ProductVendor::orderBy('product_vendor_id', 'DESC')->paginate(5);
        $this->totalProductVendorCount = ProductVendor::count();

        return view('livewire.product-vendor.dashboard.product-vendor-list')
            ->with('productVendors', $productVendors);
    }
}
