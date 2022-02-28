<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class WebsiteController extends Controller
{
    public function homePage()
    {
        $products = Product::all();

        return view('website.home')
            ->with('products', $products);
    }
}
