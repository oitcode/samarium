<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Company;
use App\Models\Cms\Webpage\Webpage;
use App\Models\SeatTable\SeatTable;
use App\Models\Team\TeamMember;
use App\Models\Vacancy\Vacancy;
use App\Models\DocumentFile\DocumentFile;

class WebsiteController extends Controller
{
    public function homePage(): View
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('website.ecommerce.home')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function productSearch(Request $request): View
    {
        $productCategoryId = $request->input('product_category_id');
        $cityProductSpecificationValue = $request->input('city_product_specification_value');
        $buyTypeProductSpecificationValue = $request->input('buy_type_product_specification_value');
        $featuredProduct = $request->input('featured_product');

        $productSearchResults = Product::limit(100);

        if ($productCategoryId != '---') {
            $productSearchResults = $productSearchResults->whereHas('productCategory', function ($query) use ($productCategoryId) { $query->where('product_category_id', $productCategoryId);});
        }

        if ($cityProductSpecificationValue != '---') {
            $productSearchResults = $productSearchResults->whereHas('productSpecifications', function ($query) use ($cityProductSpecificationValue) {
                    $query->where('spec_value', $cityProductSpecificationValue);
                });
        }

        if ($buyTypeProductSpecificationValue != '---') {
            $productSearchResults = $productSearchResults->whereHas('productSpecifications', function ($query) use ($buyTypeProductSpecificationValue) {
                    $query->where('spec_value', $buyTypeProductSpecificationValue);
                });
        }

        if ($featuredProduct != '---') {
            $productSearchResults = $productSearchResults->where('featured_product', $featuredProduct);
        }

        $productSearchResults = $productSearchResults->get();

        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();

        return view('website.ecommerce.product-search-results')
            ->with('productSearchResults', $productSearchResults)
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products);
    }

    public function productView($id, $name): View
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

    public function productCategoryProductList($id, $name): View
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
    public function checkout(): View
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
    public function cmsHome(): View
    {
        $products = Product::all();
        $productCategories = ProductCategory::where('does_sell', 'yes')->get();
        $company = Company::first();
        $cartItems = session('cartItems');
        $featuredWebpages = Webpage::whereHas('webpageCategories', function ($query) { $query->where('name', 'featured');})
                                ->where('visibility', 'public')->orderBy('webpage_id', 'desc')->limit('4')->get();

        return view('website.cms.home')
            ->with('company', $company)
            ->with('productCategories', $productCategories)
            ->with('products', $products)
            ->with('cartItems', $cartItems)
            ->with('featuredWebpages', $featuredWebpages);
    }

    public function webpage(): View
    {
        $company = Company::first();
        $permalink = '/' . request()->path();
        $webpage = Webpage::where('permalink', $permalink)->first();

        return view('website.cms.webpage')
            ->with('company', $company)
            ->with('webpage', $webpage);
    }

    public function seatTableView($id, $name): View
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

    public function bookAppointment($id): View
    {
        $company = Company::first();
        $teamMember = TeamMember::find($id);

        return view('website.appointment.book-appointment')
            ->with('teamMember', $teamMember)
            ->with('company', $company);
    }

    public function vacancyView($id, $name): View
    {
        $company = Company::first();
        $vacancy = Vacancy::find($id);

        return view('website.vacancy.vacancy-view')
            ->with('vacancy', $vacancy)
            ->with('company', $company);
    }

    public function userSignup(): View
    {
        $company = Company::first();

        return view('website.user.signup')
            ->with('company', $company);
    }

    public function userProfile(): View
    {
        $company = Company::first();

        return view('website.user.profile')
            ->with('company', $company);
    }

    public function writeTestimonial(): View
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
