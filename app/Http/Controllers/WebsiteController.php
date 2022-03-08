<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductCategory;
use App\Company;

class WebsiteController extends Controller
{
    public function homePage()
    {
        $products = Product::all();
        $productCategories = ProductCategory::all();
        $company = Company::first();

        return view('website.home')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function productView($id, $name)
    {
        $products = Product::all();
        $productCategories = ProductCategory::all();
        $company = Company::first();

        $product = Product::find($id);

        return view('website.product-view')
            ->with('product', $product)
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }
}
