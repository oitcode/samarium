<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect('/dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Dashboard */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

/* Product category */
Route::get('/dashboard/productCategory', 'ProductCategoryController@index')->name('product-category');

/* Customer */
Route::get('/dashboard/customer', 'CustomerController@index')->name('customer');

/* Sale */
Route::get('/dashboard/sale', 'SaleController@index')->name('sale');

/* Daybook */
Route::get('/dashboard/daybook', 'DaybookController@index')->name('daybook');

/* Expense */
Route::get('/dashboard/expense', 'ExpenseController@index')->name('expense');

/* Menu */
Route::get('/dashboard/menu', 'MenuController@index')->name('menu');
