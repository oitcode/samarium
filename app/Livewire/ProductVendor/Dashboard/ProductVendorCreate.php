<?php

namespace App\Livewire\ProductVendor\Dashboard;

use Livewire\Component;

use App\ProductVendor;

class ProductVendorCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.product-vendor.dashboard.product-vendor-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        ProductVendor::create($validatedData);

        session()->flash('message', 'Product Vendor Added');

        $this->dispatch('productVendorCreateCompleted');
    }
}
