<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\ProductVendor;

class ProductVendorSearch extends Component
{
    public $product_vendor_search_name;

    public $productVendors;
    public $searchDone = false;

    public function render(): View
    {
        return view('livewire.product-vendor.dashboard.product-vendor-search');
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'product_vendor_search_name' => 'required',
        ]);

        $productVendors = ProductVendor::where('name', 'like', '%'.$validatedData['product_vendor_search_name'].'%')->get();

        $this->productVendors = $productVendors;
        $this->searchDone = true;
    }
}
