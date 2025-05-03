<?php

namespace App\Services;

use App\Product;
use App\ProductCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class ProductCategoryService
{
    /**
     * Create a new product category
     *
     * @param array $data
     * @param UploadedFile|null $image
     * @return ProductCategory
     */
    public function createProductCategory(array $data, ?UploadedFile $image): ProductCategory
    {
        if ($image !== null) {
            $imagePath = $image->store('productCategory', 'public');
            $data['image_path'] = $imagePath;
        }

        $productCategory = ProductCategory::create($data);

        return $productCategory;
    }

    /**
     * Check if a product category can be deleted.
     *
     * @param int $product_category_id
     * @return void
     */
    public function canDeleteProductCategory(int $product_category_id): bool
    {
        // Todo
    }

    /**
     * Delete product category
     *
     * @param int $product_category_id
     * @return void
     */
    public function deleteProductCategory(int $product_category_id): void
    {
        // Todo
    }
}
