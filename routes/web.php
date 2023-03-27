<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

use App\Webpage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
 *-----------------------------------------------------------------------------
 * Authorization routes
 *-----------------------------------------------------------------------------
 *
 * Default authorization routes provide by laravel.
 *
 *
 */
Auth::routes(['register' => false,]);

/*
 *-----------------------------------------------------------------------------
 * Dashboard routes
 *-----------------------------------------------------------------------------
 *
 * Routes for the dashboard side of this application.
 *
 *
 */

/* Dashboard */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

/* Product category */
Route::get('/dashboard/productCategory', 'ProductCategoryController@index')->name('product-category');

/* Customer */
Route::get('/dashboard/customer', 'CustomerController@index')->name('customer');

/* Sale */
Route::get('/dashboard/sale', 'SaleController@takeaway')->name('sale');

/* Daybook */
Route::get('/dashboard/daybook', 'DaybookController@index')->name('daybook');
/* Weekbook */
Route::get('/dashboard/weekbook', 'WeekbookController@index')->name('weekbook');

/* Expense */
Route::get('/dashboard/expense', 'ExpenseController@index')->name('dashboard-expense');

/* Purchase */
Route::get('/dashboard/purchase', 'PurchaseController@index')->name('dashboard-purchase');

/* Menu */
Route::get('/dashboard/menu', 'MenuController@index')->name('menu');

/* Seat Tables */
Route::get('/dashboard/cafesale', 'SeatTableController@index')->name('cafesale');

/* Online Order */
Route::get('/dashboard/onlineorder', 'OnlineOrderController@index')->name('online-order');

/* Accounting */
Route::get('/dashboard/accounting', 'AccountingController@index')->name('dashboard-accounting');

/* Settings */
Route::get('/dashboard/settings', 'SettingsController@index')->name('dashboard-settings');

/* Company */
Route::get('/dashboard/company', 'CompanyController@index')->name('company');

/* Vendor */
Route::get('/dashboard/vendor', 'VendorController@index')->name('dashboard-vendor');

/* Report */
Route::get('/dashboard/report', 'ReportController@index')->name('dashboard-report');

/* Report */
Route::get('/dashboard/changePassword', 'ChangePasswordController@index')->name('dashboard-change-password');

/* Stock */
Route::get('/dashboard/inventory', 'InventoryController@index')->name('dashboard-inventory');

/* Todo */
Route::get('/dashboard/todo', 'TodoController@index')->name('dashboard-todo');

/* Team */
Route::get('/dashboard/team', 'TeamController@index')->name('dashboard-team');

/*
 *-----------------------------------------------------------------------------
 * Website routes
 *-----------------------------------------------------------------------------
 *
 * Routes for the website side of this application.
 *
 *
 */


/* Website home page */

if (env('SITE_TYPE') == 'erp') {
    Route::get('/', 'WebsiteController@homePage')->name('website-home');
} else {
    Route::get('/', 'WebsiteController@cmsHome')->name('website-home');
}


/* Product category page. Shows all product of this category  */
Route::get('/product/category/{id}/{name}', 'WebsiteController@productCategoryProductList')->name('website-product-category-product-list');

/* Product View */
Route::get('/product/{id}/{name}', 'WebsiteController@productView')->name('website-product-view');

/* Checkout page  */
Route::get('/checkout', 'WebsiteController@checkout')->name('website-checkout');


/*
 *-----------------------------------------------------------------------------
 * Ecommerce/shop collection
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
if (true || preg_match("/shop/i", env('MODULES'))) {
    $ecommCollectionWebpages = [
        'about-us',
        'contact-us',
        'careers',
        'press',
        'payments',
        'shipping',
        'cancellation-and-returns',
        'faq',
        'return-policy',
        'terms-of-use',
        'privacy',
        'sitemap',
    ];

    foreach ($ecommCollectionWebpages as $ecommCollectionWebpage) {
        Route::get(
            '/' . $ecommCollectionWebpage,
            'WebsiteController@ecommCollectionWebpageDisplay'
        )->name('ecomm-collection-webpage-display-' . $ecommCollectionWebpage);
    }
}


/*
 *-----------------------------------------------------------------------------
 * CMS
 *-----------------------------------------------------------------------------
 *
 *
 *
 */

/* CMS Dashboard routes */
Route::get('/cms/webpage', 'CmsWebpageController@index')->name('dashboard-cms-webpage');
Route::get('/cms/post', 'CmsPostController@index')->name('dashboard-cms-post');
Route::get('/cms/navMenu', 'CmsNavMenuController@index')->name('dashboard-cms-nav-menu');
Route::get('/cms/theme', 'CmsThemeController@index')->name('dashboard-cms-theme');
Route::get('/cms/gallery', 'CmsGalleryController@index')->name('dashboard-cms-gallery');

/* CMS website/front-page/customer routes */
/* Generate webpage routes if ?? */
if (Schema::hasTable('webpage')) {
    $webpages = Webpage::all();
    
    foreach ($webpages as $webpage) {
        Route::get('/'. $webpage->permalink, 'WebsiteController@webpage')->name('website-webpage-'. $webpage->permalink);
    }
}



/*
 *-----------------------------------------------------------------------------
 * School
 *-----------------------------------------------------------------------------
 *
 *
 *
 */

Route::get('/dashboard/school/calendar', 'SchoolCalendarController@index')->name('dashboard-school-calendar');


/*
 *-----------------------------------------------------------------------------
 * Print
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
Route::get('/dashboard/print/saleInvoice/{id}', 'PrintController@printSaleInvoice')->name('dashboard-print-sale-invoice');


/*
 *-----------------------------------------------------------------------------
 * VAT
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
Route::get('/dashboard/vat', 'VatController@index')->name('dashboard-vat');


/*
 *-----------------------------------------------------------------------------
 * BGC
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
Route::get('/dashboard/quick-contacts', 'BgcController@quickContacts')->name('dashboard-quick-contacts');
Route::get('/dashboard/organizing-committee', 'BgcController@organizingCommittee')->name('dashboard-organizing-committee');
Route::get('/dashboard/sponsors', 'BgcController@sponsors')->name('dashboard-sponsors');
