<?php

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

// TODO: email verification middleware

Route::get('/', 'PageController@home');
Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');
Route::get('privacy-policy', 'PageController@privacyPolicy');
Route::get('terms-conditions', 'PageController@terms');

Route::get('discover/{category}', 'DiscoveryController@index');
Route::get('discover', 'DiscoveryController@index');
Route::resource('news', 'NewsController');

Auth::routes(['verify' => true]);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('profile', 'UserController');
    Route::resource('credits', 'CreditController');

    Route::resource('projects', 'ProjectController');

    Route::get('/pledges', 'ProjectPledgeController@index');
    Route::get('/pledges/{pledge}', 'ProjectPledgeController@show');
    Route::patch('/pledges/{pledge}', 'ProjectPledgeController@update');
    Route::patch('/projects/{project}/pledge', 'ProjectPledgeController@store');

    Route::get('stripe', 'PaymentController@getStripeForm');
    Route::post('stripe', 'PaymentController@postStripePayment')->name('stripe.post');
    Route::get('/home', 'HomeController@index')->name('home');
});


Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/account', 'AccountController@index');
});
