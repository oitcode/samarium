<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

use App\ProductQuestion;

class ProductQuestionList extends Component
{
    public $productQuestions;

    public function render()
    {
        $this->productQuestions = ProductQuestion::all();

        return view('livewire.product.dashboard.product-question-list');
    }
}
