<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Product;
use App\ProductCategory;

class EcommWebsiteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product_display_page_works()
    {
        Product::factory()->create();

        $product = Product::first();

        $response = $this->get('/product/' . $product->product_id . '/' . $product->name);

        $response->assertStatus(200);
    }

    public function test_product_category_list_display_page_works()
    {
        Product::factory()->create();

        $productCategory = ProductCategory::first();

        $response = $this->get('/product/category/' . $productCategory->product_category_id . '/' . $productCategory->name);

        $response->assertStatus(200);
    }
}
