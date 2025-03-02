<?php

use App\Webpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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


/* Authorization routes: Provide by laravel/ui package. */
Auth::routes(['verify' => true,]);

/*
 * Dashboard routes: Routes for the dashboard side of this application.
 *
 */

Route::get('/dashboard', 'DashboardController@index')->middleware('isAdmin')  ->name('dashboard');
Route::get('/dashboard/product-category', 'ProductCategoryController@index')  ->name('product-category');
Route::get('/dashboard/product', 'ProductController@index')                   ->name('product');
Route::get('/dashboard/sale', 'SaleController@saleInvoice')                   ->name('sale');
Route::get('/dashboard/takeaway', 'SaleController@takeaway')                  ->name('takeaway');
Route::get('/dashboard/sale-quotation', 'SaleQuotationController@index')      ->name('dashboard-sale-quotation');
Route::get('/dashboard/expense', 'ExpenseController@index')                   ->name('dashboard-expense');
Route::get('/dashboard/purchase', 'PurchaseController@index')                 ->name('dashboard-purchase');
Route::get('/dashboard/customer', 'CustomerController@index')                 ->name('customer');
Route::get('/dashboard/vendor', 'VendorController@index')                     ->name('dashboard-vendor');
Route::get('/dashboard/daybook', 'DaybookController@index')                   ->name('daybook');
Route::get('/dashboard/weekbook', 'WeekbookController@index')                 ->name('weekbook');
Route::get('/dashboard/product-vendor', 'ProductVendorController@index')      ->name('product-vendor');
Route::get('/dashboard/product-question', 'ProductQuestionController@index')  ->name('product-question');
Route::get('/dashboard/cafesale', 'SeatTableController@index')                ->name('cafesale');
Route::get('/dashboard/onlineorder', 'OnlineOrderController@index')           ->name('online-order');
Route::get('/dashboard/accounting', 'AccountingController@index')             ->name('dashboard-accounting');
Route::get('/dashboard/settings', 'SettingsController@index')                 ->name('dashboard-settings');
Route::get('/dashboard/company', 'CompanyController@index')                   ->name('company');
Route::get('/dashboard/report', 'ReportController@index')                     ->name('dashboard-report');
Route::get('/dashboard/changePassword', 'ChangePasswordController@index')     ->name('dashboard-change-password');
Route::get('/dashboard/inventory', 'InventoryController@index')               ->name('dashboard-inventory');
Route::get('/dashboard/todo', 'TodoController@index')                         ->name('dashboard-todo');
Route::get('/dashboard/team', 'TeamController@index')                         ->name('dashboard-team');
Route::get('/dashboard/help', 'HelpController@index')                         ->name('dashboard-help');
Route::get('/dashboard/users', 'UsersController@index')                       ->name('dashboard-users');
Route::get('/dashboard/user-group', 'UserGroupController@index')              ->name('dashboard-user-group');
Route::get('/dashboard/own-profile', 'UserOwnProfileController@index')        ->name('dashboard-user-own-profile');
Route::get('/dashboard/contact-form', 'ContactFormController@index')          ->name('dashboard-contact-form');
Route::get('/dashboard/appointment', 'AppointmentController@index')           ->name('dashboard-appointment');
Route::get('/dashboard/vacancy', 'VacancyController@index')                   ->name('dashboard-vacancy');
Route::get('/dashboard/testimonial', 'TestimonialController@index')           ->name('dashboard-testimonial');
Route::get('/dashboard/document/url-link', 'UrlLinkController@index')         ->name('dashboard-document-url-link');
Route::get('/dashboard/document/file', 'DocumentFileController@index')        ->name('dashboard-document-file');
Route::get('/dashboard/educ/institution', 'EducInstitutionController@index')  ->name('dashboard-educ-institution');
Route::get('/cms/webpage', 'CmsWebpageController@index')                      ->name('dashboard-cms-webpage');
Route::get('/cms/post', 'CmsPostController@index')                            ->name('dashboard-cms-post');
Route::get('/cms/navMenu', 'CmsNavMenuController@index')                      ->name('dashboard-cms-nav-menu');
Route::get('/cms/theme', 'CmsThemeController@index')                          ->name('dashboard-cms-theme');
Route::get('/cms/gallery', 'CmsGalleryController@index')                      ->name('dashboard-cms-gallery');
Route::get('/dashboard/school/calendar', 'SchoolCalendarController@index')    ->name('dashboard-school-calendar');
Route::get('/dashboard/vat', 'VatController@index')                           ->name('dashboard-vat');
Route::get('/dashboard/quick-contacts', 'BgcController@quickContacts')        ->name('dashboard-quick-contacts');
Route::get('/dashboard/sponsors', 'BgcController@sponsors')                   ->name('dashboard-sponsors');

Route::get('/dashboard/document/file/display/{id}', 'DocumentFileController@pdfDisplayFile')  ->name('dashboard-document-file-pdf-display');
Route::get('/dashboard/calendar/calendar-group', 'CalendarGroupController@index')             ->name('dashboard-calendar-group');
Route::get('/dashboard/print/saleInvoice/{id}', 'PrintController@printSaleInvoice')           ->name('dashboard-print-sale-invoice');
Route::get('/dashboard/print/saleQuotation/{id}', 'PrintController@printSaleQuotation')       ->name('dashboard-print-sale-quotation');
Route::get('/dashboard/organizing-committee', 'BgcController@organizingCommittee')            ->name('dashboard-organizing-committee');
Route::get('/dashboard/newsletter-subscription', 'NewsletterSubscriptionController@index')    ->name('dashboard-newsletter-subscription');

/*
 * Website routes: Routes for the website side of this application.
 *
 */

if (config('app.site_type') === 'erp') {
    Route::get('/', 'WebsiteController@homePage')->name('website-home');
} else {
    Route::get('/', 'WebsiteController@cmsHome') ->name('website-home');
}

Route::get('/user/profile', 'WebsiteController@userProfile')->middleware(['auth', 'verified',])  ->name('website-user-profile');
Route::get('/product/category/{id}/{name}', 'WebsiteController@productCategoryProductList')      ->name('website-product-category-product-list');
Route::get('/product/{id}/{name}', 'WebsiteController@productView')                              ->name('website-product-view');
Route::get('/checkout', 'WebsiteController@checkout')                                            ->name('website-checkout');
Route::get('/write-testimonial', 'WebsiteController@writeTestimonial')                           ->name('website-write-testimonial');
Route::get('/o/table/{id}/{name}', 'WebsiteController@seatTableView')                            ->name('website-seat-table-view');
Route::get('/book-appointment/{id}', 'WebsiteController@bookAppointment')                        ->name('website-book-appointment');
Route::get('/vacancy/{id}/{name}', 'WebsiteController@vacancyView')                              ->name('website-vacancy-view');
Route::get('/user/signup', 'WebsiteController@userSignup')                                       ->name('website-user-signup');
Route::get('/document/file/display/{id}', 'WebsiteController@pdfDisplayFile')                    ->name('website-document-file-pdf-display');
