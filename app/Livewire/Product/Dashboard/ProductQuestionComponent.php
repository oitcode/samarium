<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class ProductQuestionComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'create' => false,
        'list' => true,
        'display' => false,
        'delete' => false,
    ];

    public function render()
    {
        return view('livewire.product.dashboard.product-question-component');
    }
}
