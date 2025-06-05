<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductCategoryService
{
    /**
     * Get paginated list of product categories
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedProductCategories(int $perPage = 5): LengthAwarePaginator
    {
        return ProductCategory::orderBy('product_category_id', 'DESC')->paginate($perPage);
    }

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
        $productCategory = ProductCategory::find($product_category_id);

        if (count($productCategory->products) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete product category
     *
     * @param int $product_category_id
     * @return void
     */
    public function deleteProductCategory(int $product_category_id): void
    {
        $productCategory = ProductCategory::find($product_category_id);

        $productCategory->delete();
    }

    /**
     * Update product category name
     *
     * @param int $product_category_id
     * @param string $name
     * @return void
     */
    public function updateName(int $product_category_id, string $name): void
    {
        $productCategory = ProductCategory::find($product_category_id);

        $productCategory->name = $name;
        $productCategory->save();
    }

    /**
     * Update product category image
     *
     * @param int $product_category_id
     * @param string $name
     * @return void
     */
    public function updateImage(int $product_category_id, UploadedFile $image): void
    {
        $productCategory = ProductCategory::find($product_category_id);

        $imagePath = $image->store('productCategories', 'public');
        $productCategory->image_path = $imagePath;
        $productCategory->save();
    }

    /**
     * Toggle product category sellability
     *
     * @param int $product_category_id
     * @return void
     */
    public function toggleSellability(int $product_category_id): void
    {
        $productCategory = ProductCategory::find($product_category_id);

        if ($productCategory->does_sell == 'yes') {
            $productCategory->does_sell = 'no';
        } else {
            $productCategory->does_sell = 'yes';
        }

        $productCategory->save();
    }

    public function getTotalProductCategoryCount()
    {
        return ProductCategory::count();
    }
}
