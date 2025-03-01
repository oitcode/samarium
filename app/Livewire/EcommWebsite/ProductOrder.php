<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\View\View;
use App\WebsiteOrder;

class ProductOrder extends Component
{
    public $product;

    public $phone;
    public $address;

    public function render(): View
    {
        return view('livewire.ecomm-website.product-order');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'phone' => 'required',
            'address' => 'nullable',
        ]);

        $validatedData['product_id'] = $this->product->product_id;

        WebsiteOrder::create($validatedData);

        session()->flash('message', 'Order received');
        $this->resetInputFields();
    }

    public function resetInputFields(): void
    {
        $this->phone = '';
        $this->address = '';
    }
}
