<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use App\Traits\ModesTrait;
use App\ProductQuestion;

class ProductQuestionComponent extends Component
{
    use ModesTrait;

    public $displayingProductQuestion;

    public $modes = [
        'create' => false,
        'list' => true,
        'display' => false,
        'delete' => false,
    ];

    protected $listeners = [
        'displayProductQuestion',
        'exitProductQuestionDisplay',
    ];

    public function render()
    {
        return view('livewire.product.dashboard.product-question-component');
    }

    public function displayProductQuestion(ProductQuestion $productQuestion)
    {
        $this->displayingProductQuestion = $productQuestion;
        $this->enterMode('display');
    }

    public function exitProductQuestionDisplay()
    {
        $this->displayingProductQuestion = null;
        $this->exitMode('display');
    }
}
