<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Company;

class WebsiteController extends Controller
{
    public function homePage()
    {
        $products = Product::all();
        $company = Company::first();

        return view('website.home')
            ->with('company', $company)
            ->with('products', $products);
    }
}
