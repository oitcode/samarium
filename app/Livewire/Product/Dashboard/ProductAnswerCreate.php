<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\ProductAnswer;

class ProductAnswerCreate extends Component
{
    public $productQuestion;

    public $answer_text;

    public function render(): View
    {
        return view('livewire.product.dashboard.product-answer-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'answer_text' => 'required',
        ]);

        $productAnswer = new ProductAnswer;

        $productAnswer->product_question_id = $this->productQuestion->product_question_id;
        $productAnswer->answer_text = $validatedData['answer_text'];

        $productAnswer->save();

        $this->dispatch('createProductAnswerCompleted');
    }
}
