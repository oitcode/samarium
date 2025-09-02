<?php

namespace App\Livewire\Product\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Product\ProductReview;

class ProductReviewCreate extends Component
{
    public $product;

    public $writer_name;
    public $writer_info;
    public $rating;
    public $review_text;

    public function render(): View
    {
        return view('livewire.product.website.product-review-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'writer_name' => 'nullable',
            'writer_info' => 'nullable',
            'rating' => 'required|integer',
            'review_text' => 'required|string',
        ]);

        $validatedData['product_id'] = $this->product->product_id;

        ProductReview::create($validatedData);
        $this->dispatch('createProductReviewCompleted');
    }
}
