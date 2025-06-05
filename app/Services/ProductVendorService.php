<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\ProductVendor;

class ProductVendorService
{
    /**
     * Get paginated list of product vendors
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedProductVendors(int $perPage = 5): LengthAwarePaginator
    {
        return ProductVendor::orderBy('product_vendor_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new product vendor
     *
     * @param array $data
     * @return ProductVendor
     */
    public function createProductVendor(array $data): ProductVendor
    {
        $productVendor = ProductVendor::create($data);

        return $productVendor;
    }

    /**
     * Check if a product vendor can be deleted.
     *
     * @param int $product_vendor_id
     * @return void
     */
    public function canDeleteProductVendor(int $product_vendor_id): bool
    {
        $productVendor = ProductVendor::find($product_vendor_id);

        if (count($productVendor->products) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete product vendor
     *
     * @param int $product_vendor_id
     * @return void
     */
    public function deleteProductVendor(int $product_vendor_id): void
    {
        $productVendor = ProductVendor::find($product_vendor_id);

        $productVendor->delete();
    }

    /**
     * Update product vendor name
     *
     * @param int $product_vendor_id
     * @param string $name
     * @return void
     */
    public function updateName(int $product_vendor_id, string $name): void
    {
        $productVendor = ProductVendor::find($product_vendor_id);

        $productVendor->name = $name;
        $productVendor->save();
    }

    /**
     * Get total product vendor count
     *
     * @param int $product_vendor_id
     * @return int
     */
    public function getTotalProductVendorCount(): int
    {
        return ProductVendor::count();
    }
}
