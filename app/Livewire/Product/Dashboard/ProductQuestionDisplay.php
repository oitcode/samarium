<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;

class ProductQuestionDisplay extends Component
{
    public $productQuestion;

    public function render()
    {
        return view('livewire.product.dashboard.product-question-display');
    }
}
