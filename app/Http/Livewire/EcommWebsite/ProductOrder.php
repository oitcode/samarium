<?php

namespace App\Http\Livewire\EcommWebsite;

use Livewire\Component;

use App\WebsiteOrder;

class ProductOrder extends Component
{
    public $product;

    public $phone;
    public $address;

    public function render()
    {
        return view('livewire.ecomm-website.product-order');
    }

    public function store()
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

    public function resetInputFields()
    {
        $this->phone = '';
        $this->address = '';
    }
}
