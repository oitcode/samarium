<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductCategory;
use App\Company;
use App\Webpage;
use App\SeatTable;
use App\TeamMember;
use App\Vacancy;
use App\DocumentFile;

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

        /* Increate product view count. */
        $product->website_views = $product->website_views + 1;
        $product->save();

        return view('website.ecommerce.product-view')
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

        return view('website.ecommerce.product-category-product-list')
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

        return view('website.ecommerce.checkout')
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

        return view('website.cms.home')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products)
            ->with('cartItems', $cartItems);
    }

    public function webpage()
    {
        $company = Company::first();
        $permalink = '/' . request()->path();
        $webpage = Webpage::where('permalink', $permalink)->first();

        return view('website.cms.webpage')
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

    public function seatTableView($id, $name)
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();
        $seatTable = SeatTable::find($id);

        return view('website.cafe-sale.seat-table-view')
            ->with('seatTable', $seatTable)
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function bookAppointment($id)
    {
        $company = Company::first();
        $teamMember = TeamMember::find($id);

        return view('website.appointment.book-appointment')
            ->with('teamMember', $teamMember)
            ->with('company', $company);
    }

    public function vacancyView($id, $name)
    {
        $company = Company::first();
        $vacancy = Vacancy::find($id);

        return view('website.vacancy.vacancy-view')
            ->with('vacancy', $vacancy)
            ->with('company', $company);
    }

    public function userSignup()
    {
        $company = Company::first();

        return view('website.user.signup')
            ->with('company', $company);
    }

    public function userProfile()
    {
        $company = Company::first();

        return view('website.user.profile')
            ->with('company', $company);
    }

    public function writeTestimonial()
    {
        $company = Company::first();

        return view('website.testimonial.testimonial-create')
            ->with('company', $company);
    }

    public function pdfDisplayFile($documentFileId)
    {
        $documentFile = DocumentFile::find($documentFileId);

        return response()->file('storage/' . $documentFile->file_path);
    }
}
