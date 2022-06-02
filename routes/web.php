<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

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
Route::get('/', 'WebsiteController@homePage')->name('website-home');

/* Product category page. Shows all product of this category  */
Route::get('/product/category/{id}/{name}', 'WebsiteController@productCategoryProductList')->name('website-product-category-product-list');

/* Product View */
Route::get('/product/{id}/{name}', 'WebsiteController@productView')->name('website-product-view');

/* Checkout page  */
Route::get('/checkout', 'WebsiteController@checkout')->name('website-checkout');


// Todo: Need to get rid of this route
// Route::get('/home', 'HomeController@index')->name('home');

/*
 *-----------------------------------------------------------------------------
 * Consultancy site route
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
if (env('SITE_TYPE') == 'ecs') {
    Route::get('/', 'WebsiteController@bia')->name('website-home');
    Route::get('/contactus', 'WebsiteController@contactUs')->name('website-ecs-contact-us');
    Route::get('/gallery', 'WebsiteController@gallery')->name('website-ecs-gallery');
    Route::get('/abroadstudy/usa', 'WebsiteController@abroadStudyUsa')->name('website-ecs-usa');
    Route::get('/abroadstudy/uk', 'WebsiteController@abroadStudyUk')->name('website-ecs-uk');
    Route::get('/abroadstudy/australia', 'WebsiteController@abroadStudyAustralia')->name('website-ecs-australia');
    Route::get('/abroadstudy/newzealand', 'WebsiteController@abroadStudyNewzealand')->name('website-ecs-newzealand');
    Route::get('/abroadstudy/japan', 'WebsiteController@abroadStudyJapan')->name('website-ecs-japan');
    Route::get('/toefl', 'WebsiteController@toefl')->name('website-ecs-toefl');
    Route::get('/ielts', 'WebsiteController@ielts')->name('website-ecs-ielts');
    Route::get('/pte', 'WebsiteController@pte')->name('website-ecs-pte');
} else {
    Route::get('/', 'WebsiteController@homePage')->name('website-home');
}

Route::get('/bia/pte', 'WebsiteController@pte')->name('website-pte');

// $webpages = Webpage::all();
// 
// foreach ($webpages as $webpage) {
//     Route::get('/'. $webpage->permalink, 'WebsiteController@webpage')->name('website-webpage-'. $webpage->permalink);
// }

Route::get('/ecs/menudemo', 'WebsiteController@menuDemo')->name('website-menu-demo');


/*
 *-----------------------------------------------------------------------------
 * CMS
 *-----------------------------------------------------------------------------
 *
 *
 *
 */

Route::get('/cms/webpage', 'CmsWebpageController@index')->name('dashboard-cms-webpage');
Route::get('/cms/navMenu', 'CmsNavMenuController@index')->name('dashboard-cms-nav-menu');
