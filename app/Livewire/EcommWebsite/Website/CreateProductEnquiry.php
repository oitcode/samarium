<?php

namespace App\Livewire\EcommWebsite\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\ProductEnquiry;

class CreateProductEnquiry extends Component
{
    public $product;

    public $writer_name; 
    public $writer_email; 
    public $writer_phone; 
    public $enquiry_text; 

    public function render(): View
    {
        return view('livewire.ecomm-website.website.create-product-enquiry');
    }

    public function store(): void
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

    public function resetInputFields(): void
    {
        $this->writer_name = '';
        $this->writer_email = '';
        $this->writer_phone = '';
        $this->enquiry_text = '';
    }
}
