<?php

namespace App\Livewire\Product\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Product\ProductQuestion;

class ProductQuestionCreate extends Component
{
    public $product;

    public $writer_name;
    public $writer_info;
    public $rating;
    public $question_text;

    public function render(): View
    {
        return view('livewire.product.website.product-question-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'writer_name' => 'nullable',
            'writer_info' => 'nullable',
            'question_text' => 'required|string',
        ]);

        $validatedData['product_id'] = $this->product->product_id;

        ProductQuestion::create($validatedData);
        $this->dispatch('createProductQuestionCompleted');
    }
}
