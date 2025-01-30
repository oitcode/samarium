<?php

namespace App\Livewire\EcommWebsite\Website;

use Livewire\Component;
use App\ProductEnquiry;

class CreateProductEnquiry extends Component
{
    public $product;

    public $writer_name; 
    public $writer_email; 
    public $writer_phone; 
    public $enquiry_text; 

    public function render()
    {
        return view('livewire.ecomm-website.website.create-product-enquiry');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'writer_name' => 'nullable',
            'writer_email' => 'required|email',
            'writer_phone' => 'required',
            'enquiry_text' => 'required|string',
        ]);

        $validatedData['product_id'] = $this->product->product_id;

        ProductEnquiry::create($validatedData);
        $this->resetInputFields();
        session()->flash('message', 'Enquiry sumbmitted');
    }

    public function resetInputFields()
    {
        $this->writer_name = '';
        $this->writer_email = '';
        $this->writer_phone = '';
        $this->enquiry_text = '';
    }
}
