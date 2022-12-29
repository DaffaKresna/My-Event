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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');
Route::get('create-yours', 'HomeController@createEvent');

Route::get('detail/{slug}', 'EventController@show');

Route::prefix('admin')->namespace('Admin')->middleware('role:admin')->group(function () {
    // Order
    Route::resource('orders', 'OrderController');

    // Event
    Route::resource('events', 'EventController');
    Route::get('events/{id}/delete', 'EventController@destroy')->name('admin.events.delete');
    Route::get('events/{eventID}/images', 'EventController@images')->name('admin.events.images');
    Route::get('events/{eventID}/add-image', 'EventController@add_image')->name('admin.events.add_image');
    Route::post('events/image/{eventID}', 'EventController@upload_image')->name('admin.events.upload_image');
    Route::delete('events/image/{imageID}', 'EventController@remove_image')->name('admin.events.remove_image');
});

Route::middleware('auth')->group(function () {
    // Route::get('events/checkout', 'EventController@checkout');
    Route::post('events/checkout', 'EventController@doCheckout');
    Route::get('events/received/{orderID}', 'EventController@received');
});

require __DIR__ . '/auth.php';
