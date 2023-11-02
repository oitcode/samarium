<?php

namespace App\Http\Livewire\Product\Website;

use Livewire\Component;

use App\ProductReview;

class ProductReviewCreate extends Component
{
    public $product;

    public $writer_name;
    public $writer_info;
    public $rating;
    public $review_text;

    public function render()
    {
        return view('livewire.product.website.product-review-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'writer_name' => 'nullable',
            'writer_info' => 'nullable',
            'rating' => 'required|integer',
            'review_text' => 'required|string',
        ]);

        $validatedData['product_id'] = $this->product->product_id;

        ProductReview::create($validatedData);
        $this->emit('createProductReviewCompleted');
    }
}
