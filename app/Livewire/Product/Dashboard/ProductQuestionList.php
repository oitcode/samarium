<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Services\ProductQuestionService;
use App\ProductQuestion;

/**
 * ProductQuestionList Livewire Component
 * 
 * This Livewire component handles the listing of product questions.
 */
class ProductQuestionList extends Component
{
    use WithPagination;

    /**
     * Total count of product vendors
     *
     * @var int
     */
    public $totalProductQuestionCount;

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(ProductQuestionService $productQuestionService): View
    {
        $productQuestions = $productQuestionService->getPaginatedProductQuestions(5);
        $this->totalProductQuestionCount = $productQuestionService->getTotalProductQuestionCount();

        return view('livewire.product.dashboard.product-question-list', [
            'productQuestions' => $productQuestions,
        ]);
    }
}
