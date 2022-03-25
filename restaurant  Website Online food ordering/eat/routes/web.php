<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


/** Login Dashboard **/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('frontend.pages.index');
})->name('dashboard');
 
/** User Frontend **/
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@usertyp');
Route::get('/admin', 'AdminController@index') -> name('admintype');

Route::post('/reservation/complete', 'HomeController@addreservation');
Route::post('/menu/order', 'OrderController@addtocart');

Route::get('/home/cart', 'HomeController@cartpage');
Route::post('/cart/update', 'OrderController@cartupdate');
Route::get('/cart/{id}/delete/', 'OrderController@destroycart');
Route::get('/cart/checkout', 'OrderController@checkout');
Route::post('/cart/checkout/order', 'OrderController@checkoutorder');


/** Admin Backend **/
Route::get('/users', 'AdminController@users');
Route::get('/users/delete/{id}', 'AdminController@destroyuser');
Route::get('/users/email/{id}', 'MailController@getmail');
Route::post('/users/email/{id}/send', 'MailController@sendEmail');

Route::get('/pages/home', 'AdminController@homepage');
Route::post('/pages/slider/image/upload', 'AdminController@homestore');
Route::get('/pages/slider/image/delete/{id}', 'AdminController@destroyslider');

Route::get('/pages/about', 'AdminController@aboutpage');
Route::post('/pages/about/image/upload', 'AdminController@aboutstore');
Route::get('/pages/about/image/{id}/delete', 'AdminController@destroyabout');
Route::post('/pages/about/content/upload', 'AdminController@aboutcontentstore');

Route::get('/pages/menu', 'AdminController@menupage');
Route::get('/pages/menu/{id}/delete', 'AdminController@destroymenu');
Route::post('/pages/menu/add', 'AdminController@menustore');
Route::get('/pages/menu/{id}/edit', 'AdminController@editmenu');
Route::post('/pages/menu/{id}/update', 'AdminController@updatemenu');

Route::get('/pages/chefs', 'AdminController@chefspage');
Route::post('/pages/chefs/add', 'AdminController@chefstore');
Route::get('/pages/chefs/{id}/edit', 'AdminController@editchefs');
Route::get('/pages/chefs/{id}/delete', 'AdminController@deletechefs');
Route::post('/pages/chefs/{id}/update', 'AdminController@updatechefs');

Route::get('/pages/contacts', 'AdminController@contactpage');
Route::post('/pages/contact/update', 'AdminController@contactupdate');

Route::get('/reservations', 'AdminController@reservationpage');
Route::get('/reservations/email/{id}', 'MailController@reservationmail');
Route::post('/reservations/email/{id}/send', 'MailController@reservationsendEmail');
Route::get('/reservations/delete/{id}', 'AdminController@destroyreservations');
Route::post('/reservations/status/update', 'AdminController@reservationupdate');

Route::get('/orders', 'AdminController@orderpage');
Route::get('/orders/delete/{id}', 'AdminController@destroyorders');
Route::get('/orders/email/{id}', 'MailController@ordermail');
Route::post('/orders/email/{id}/send', 'MailController@ordersendEmail');


