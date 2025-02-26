<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\ProductQuestion;

class ProductQuestionList extends Component
{
    use WithPagination;

    // public $productQuestions;
    public $totalProductQuestionCount;

    public function render()
    {
        $productQuestions = ProductQuestion::orderBy('product_question_id', 'desc')->paginate(5);
        $this->totalProductQuestionCount = ProductQuestion::count();

        return view('livewire.product.dashboard.product-question-list')
            ->with('productQuestions', $productQuestions);
    }
}
