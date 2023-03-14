<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Product;
use App\ProductCategory;

class EcommWebsiteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProductDisplayPageWorks()
    {
        $product = Product::first();

        $response = $this->get('/product/' . $product->product_id . '/' . $product->name);

        $response->assertStatus(200);
    }

    public function testProductCategoryListDisplayPageWorks()
    {
        $productCategory = ProductCategory::first();

        $response = $this->get('/product/category/' . $productCategory->product_category_id . '/' . $productCategory->name);

        $response->assertStatus(200);
    }
}
