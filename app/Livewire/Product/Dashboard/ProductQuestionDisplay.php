<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductQuestionDisplay extends Component
{
    public $productQuestion;

    public function render(): View
    {
        return view('livewire.product.dashboard.product-question-display');
    }
}
