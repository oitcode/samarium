<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Product\ProductVendor;

class ProductVendorCreate extends Component
{
    public $name;

    public function render(): View
    {
        return view('livewire.product-vendor.dashboard.product-vendor-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        ProductVendor::create($validatedData);

        session()->flash('message', 'Product Vendor Added');

        $this->dispatch('productVendorCreateCompleted');
    }
}
