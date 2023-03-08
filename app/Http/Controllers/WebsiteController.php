<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductCategory;
use App\Company;
use App\Webpage;

class WebsiteController extends Controller
{
    public function homePage()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('ecomm-website.home')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function productView($id, $name)
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        $product = Product::find($id);

        return view('ecomm-website.product-view')
            ->with('product', $product)
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function productCategoryProductList($id, $name)
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        $productCategory = ProductCategory::find($id);

        return view('ecomm-website.product-category-product-list')
            ->with('productCategory', $productCategory)
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    /**
     * Show the checkout page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkout()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        $cartItems = session('cartItems');

        return view('ecomm-website.checkout')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products)
            ->with('cartItems', $cartItems);
    }


    /*
     *-------------------------------------------------------------------------
     * CMS website pages
     *-------------------------------------------------------------------------
     */

    /**
     * Show the home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cmsHome()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        $cartItems = session('cartItems');

        return view('cms.home')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products)
            ->with('cartItems', $cartItems);
    }

    /**
     * Show the contact us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*
    public function contactUs()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('ecs.contact-us')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }
    */

    /**
     * Show the contact us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gallery()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('ecs.gallery')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    /**
     * Show the contact us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function abroadStudyUsa()
    {
        $company = Company::first();

        return view('ecs.usa')
            ->with('company', $company);
    }

    public function abroadStudyUk()
    {
        $company = Company::first();

        return view('ecs.uk')
            ->with('company', $company);
    }

    public function abroadStudyAustralia()
    {
        $company = Company::first();

        return view('ecs.australia')
            ->with('company', $company);
    }

    public function abroadStudyNewzealand()
    {
        $company = Company::first();

        return view('ecs.newzealand')
            ->with('company', $company);
    }

    public function abroadStudyJapan()
    {
        $company = Company::first();

        return view('ecs.japan')
            ->with('company', $company);
    }

    public function toefl()
    {
        $company = Company::first();

        return view('ecs.toefl')
            ->with('company', $company);
    }

    public function ielts()
    {
        $company = Company::first();

        return view('ecs.ielts')
            ->with('company', $company);
    }

    public function pte()
    {
        $company = Company::first();

        return view('ecs.pte')
            ->with('company', $company);
    }

    public function webpage()
    {
        $company = Company::first();

        $permalink = '/' . request()->path();

        $webpage = Webpage::where('permalink', $permalink)->first();

        return view('cms.webpage')
            ->with('company', $company)
            ->with('webpage', $webpage);
    }

    public function aboutUs()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('collection.about-us')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function contactUs()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('collection.about-us')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function careers()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('collection.careers')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function payments()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('collection.payments')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function shipping()
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('collection.shipping')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function ecommCollectionWebpageDisplay(Request $request)
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('collection.' . $request->path())
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }
}
