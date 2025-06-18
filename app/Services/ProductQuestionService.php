<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product\ProductQuestion;

class ProductQuestionService
{
    /**
     * Get paginated list of product questions
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedProductQuestions(int $perPage = 5): LengthAwarePaginator
    {
        return ProductQuestion::orderBy('product_question_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new product question
     *
     * @param array $data
     * @return ProductQuestion
     */
    public function createProductQuestion(array $data): ProductQuestion
    {
        $productQuestion = ProductQuestion::create($data);

        return $productQuestion;
    }

    /**
     * Check if a product question can be deleted.
     *
     * @param int $product_question_id
     * @return void
     */
    public function canDeleteProductQuestion(int $product_question_id): bool
    {
        $productQuestion = ProductQuestion::find($product_question_id);

        if (count($productQuestion->productAnswers) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete product question
     *
     * @param int $product_question_id
     * @return void
     */
    public function deleteProductQuestion(int $product_question_id): void
    {
        $productQuestion = ProductQuestion::find($product_question_id);

        $productQuestion->delete();
    }

    /**
     * Get total product question count
     *
     * @return int
     */
    public function getTotalProductQuestionCount(): int
    {
        return ProductQuestion::count();
    }
}
