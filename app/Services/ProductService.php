<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use App\Models\Product;
use App\Models\ProductSpecification;

class ProductService
{
    /**
     * Create a new product with specifications
     *
     * @param array $data
     * @param UploadedFile|null $image
     * @param array $specifications
     * @return Product
     */
    public function createProduct(array $data, ?UploadedFile $image, array $specifications = []): Product
    {
        /* Process stock data */
        $data = $this->processStockData($data);
        
        /* Process product type and base product settings */
        $data = $this->processProductTypeData($data);
        
        /* Process image if provided */
        if ($image !== null) {
            $imagePath = $image->store('products', 'public');
            $data['image_path'] = $imagePath;
        }
        
        $data['featured_product'] = 'no';

        /* Create the product */
        $product = Product::create($data);
        
        // For now only create product with minimum info.
        //
        // Todo:
        //       
        // Handle base product relationship if applicable
        // $product = $this->handleBaseProductRelationship($product, $data);
        
        // Save product specifications
        // $this->saveProductSpecifications($product, $specifications);
        
        return $product;
    }
    
    /**
     * Process stock-related data
     *
     * @param array $data
     * @return array
     */
    private function processStockData(array $data): array
    {
        if ($data['stock_applicable'] == 'yes') {
            if ($data['product_type'] != 'sub') {
                /* Set stock count to the opening stock count */
                $data['stock_count'] = $data['opening_stock_count'];
            }
            
            /* Set opening stock timestamp */
            $data['opening_stock_timestamp'] = Carbon::now()->toDateTimeString();
        }
        
        return $data;
    }
    
    /**
     * Process product type data
     *
     * @param array $data
     * @return array
     */
    private function processProductTypeData(array $data): array
    {
        /* Convert string boolean values to actual booleans */
        $data['is_base_product'] = $data['is_base_product'] == 'yes' || $data['product_type'] == 'base';
        
        return $data;
    }
    
    /**
     * Handle base product relationship
     *
     * @param Product $product
     * @param array $data
     * @return Product
     */
    private function handleBaseProductRelationship(Product $product, array $data): Product
    {
        if (!empty($data['base_product_id']) && $data['base_product_id'] != '---') {
            $product->base_product_id = $data['base_product_id'];
            
            if (isset($data['inventory_unit_consumption'])) {
                $product->inventory_unit_consumption = $data['inventory_unit_consumption'];
            }
            
            $product->save();
            $product = $product->fresh();
            
            /* Copy inventory unit from base product */
            $product->inventory_unit = $product->baseProduct->inventory_unit;
            $product->save();
            $product = $product->fresh();
        }
        
        return $product;
    }
    
    /**
     * Save product specifications
     *
     * @param Product $product
     * @param array $specifications
     * @return void
     */
    private function saveProductSpecifications(Product $product, array $specifications): void
    {
        if (count($specifications) > 0) {
            $position = 0;
            
            foreach ($specifications as $spec) {
                /* Skip empty specifications */
                if (empty($spec[0]) || empty($spec[1])) {
                    continue;
                }
                
                $productSpecification = new ProductSpecification();
                $productSpecification->product_id = $product->product_id;
                $productSpecification->position = $position++;
                $productSpecification->spec_heading = $spec[0];
                $productSpecification->spec_value = $spec[1];
                $productSpecification->save();
            }
        }
    }

    /**
     * Check if a product can be deleted.
     *
     * @param int $product_id
     * @return void
     */
    public function canDeleteProduct(int $product_id): bool
    {
        $product = Product::find($product_id);

        if (count($product->saleInvoiceItems) > 0) {
            return false;
        } else if (count($product->saleQuotationItems) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete product
     *
     * @param int $product_id
     * @return void
     */
    public function deleteProduct(int $product_id): void
    {
        $product = Product::find($product_id);

        foreach ($product->productSpecifications as $productSpecification) {
            $productSpecification->delete();
        }

        foreach ($product->productSpecificationHeadings as $productSpecificationHeading) {
            $productSpecificationHeading->delete();
        }

        foreach ($product->productFeatures as $productFeature) {
            $productFeature->delete();
        }

        foreach ($product->productFeatureHeadings as $productFeatureHeading) {
            $productFeatureHeading->delete();
        }

        foreach ($product->productOptions as $productOption) {
            $productOption->delete();
        }

        foreach ($product->productOptionHeadings as $productOptionHeading) {
            $productOptionHeading->delete();
        }

        $product->delete();
    }
}
