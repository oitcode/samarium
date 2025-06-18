<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\ProductQuestionService;
use App\Models\Product\ProductQuestion;

/**
 * ProductQuestionList Livewire Component
 * 
 * This Livewire component handles the listing of product questions.
 */
class ProductQuestionList extends Component
{
    use ModesTrait;
    use WithPagination;

    /**
     * Total count of product questions
     *
     * @var int
     */
    public $totalProductQuestionCount;

    /**
     * Product question which needs to be deleted
     *
     * @var ProductQuestion
     */
    public $deletingProductQuestion;

    /**
     * Component modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false,
        'cannotDelete' => false,
    ];

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

    /**
     * Confirm if user really wants to delete a product question
     *
     * @return void
     */
    public function confirmDeleteProductQuestion(int $product_question_id, ProductQuestionService $productQuestionService): void
    {
        $this->deletingProductQuestion = ProductQuestion::find($product_question_id);

        if ($productQuestionService->canDeleteProductQuestion($product_question_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel product question delete
     *
     * @return void
     */
    public function cancelDeleteProductQuestion(): void
    {
        $this->deletingProductQuestion = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a product cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteProductQuestion(): void
    {
        $this->deletingProductQuestion = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete product question
     *
     * @return void
     */
    public function deleteProductQuestion(ProductQuestionService $productQuestionService): void
    {
        $productQuestionService->deleteProductQuestion($this->deletingProductQuestion->product_question_id);
        $this->deletingProductQuestion = null;
        $this->exitMode('confirmDelete');
    }
}
