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
//Auth::routes(['register' => false,]);
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
Route::get('/dashboard', 'DashboardController@index')
    ->middleware('isAdmin')
    ->name('dashboard');

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

/* Product Category */
Route::get('/dashboard/product-category', 'ProductCategoryController@index')->name('product-category');

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

/* Help */
Route::get('/dashboard/help', 'HelpController@index')->name('dashboard-help');

/* Users */
Route::get('/dashboard/users', 'UsersController@index')->name('dashboard-users');

/* Contact form / message  */
Route::get('/dashboard/contact-form', 'ContactFormController@index')->name('dashboard-contact-form');

/* Appointment  */
Route::get('/dashboard/appointment', 'AppointmentController@index')->name('dashboard-appointment');

/* Vacancy  */
Route::get('/dashboard/vacancy', 'VacancyController@index')->name('dashboard-vacancy');

/* Newsletter subscription  */
Route::get('/dashboard/newsletter-subscription', 'NewsletterSubscriptionController@index')->name('dashboard-newsletter-subscription');

/* Newsletter subscription  */
Route::get('/dashboard/testimonial', 'TestimonialController@index')->name('dashboard-testimonial');

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

/* Checkout page */
Route::get('/checkout', 'WebsiteController@checkout')->name('website-checkout');

/* Write testimonial page */
Route::get('/write-testimonial', 'WebsiteController@writeTestimonial')->name('website-write-testimonial');

/*
 *-----------------------------------------------------------------------------
 * Restaurant / Cafe
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
Route::get('/o/table/{id}/{name}', 'WebsiteController@seatTableView')->name('website-seat-table-view');


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
if (Schema::hasTable('webpage')) {
    $webpages = Webpage::where('visibility', 'public')->get();
    
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
 * Calendar
 *-----------------------------------------------------------------------------
 *
 *
 *
 */

Route::get('/dashboard/calendar/calendar-group', 'CalendarGroupController@index')->name('dashboard-calendar-group');


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


/*
 *-----------------------------------------------------------------------------
 * Appointment
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
Route::get('/book-appointment/{id}', 'WebsiteController@bookAppointment')->name('website-book-appointment');

/*
 *-----------------------------------------------------------------------------
 * Vacancy
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
Route::get('/vacancy/{id}/{name}', 'WebsiteController@vacancyView')->name('website-vacancy-view');

/*
 *-----------------------------------------------------------------------------
 * User related
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
Route::get('/user/signup', 'WebsiteController@userSignup')->name('website-user-signup');
Route::get('/user/profile', 'WebsiteController@userProfile')->name('website-user-profile');


/*
 *-----------------------------------------------------------------------------
 * Temporary
 *-----------------------------------------------------------------------------
 *
 *
 *
 */
Route::get('/routes', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->methods()[0] . "</td>";
        echo "<td>" . $value->uri() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});
