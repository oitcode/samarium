<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Product\ProductQuestion;

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

    public function render(): View
    {
        return view('livewire.product.dashboard.product-question-component');
    }

    public function displayProductQuestion(int $productQuestionId): void
    {
        $this->displayingProductQuestion = ProductQuestion::find($productQuestionId);
        $this->enterMode('display');
    }

    public function exitProductQuestionDisplay(): void
    {
        $this->displayingProductQuestion = null;
        $this->exitMode('display');
    }
}
