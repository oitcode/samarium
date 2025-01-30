<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use App\ProductVendor;

class ProductVendorLink extends Component
{
    public $product;

    public $productVendors;

    public $product_vendor_id;

    public function render()
    {
        $this->productVendors = ProductVendor::all();

        return view('livewire.product.dashboard.product-vendor-link');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'product_vendor_id' => 'integer',
        ]);

        $this->product->product_vendor_id = $validatedData['product_vendor_id'];
        $this->product->save();

        $this->dispatch('productVendorLinkCompleted');
    }
}
