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

/**
 * Guest routes
 * - content pages
 * - projects
 * - news
 */
Route::get('/', 'PageController@home');
Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');
Route::get('privacy-policy', 'PageController@privacyPolicy');
Route::get('terms-conditions', 'PageController@terms');

Route::get('discover/details/{id}', 'DiscoveryController@show');
Route::get('discover/details/{id}/pdf', 'DiscoveryController@getPDF');
Route::get('discover/details/{id}/pledge-history', 'DiscoveryController@showPledgeHistory');
Route::get('discover/{category}', 'DiscoveryController@index');
Route::get('discover', 'DiscoveryController@index');
Route::resource('news', 'NewsController');

/**
 * Verified user routes
 * - home (dashboard)
 * - profile
 * - projects
 * - credits
 */

Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('profile', 'UserController');
    Route::resource('projects', 'ProjectController');

    Route::patch('/projects/{project}/pledge', 'ProjectPledgeController@pledge');

    Route::get('credits', 'CreditController@index');
    Route::get('credits/pledge-history', 'CreditController@showPledgeHistory');
    Route::get('stripe', 'PaymentController@getStripeForm');
    Route::post('stripe', 'PaymentController@postStripePayment')->name('stripe.post');
    Route::post('api/convert', 'APIController@postConvert')->name('converter');
    Route::get('/home', 'HomeController@index')->name('home');
});

/**
 * Admin routes
 * - manage users
 */
Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/account', 'AccountController@index');
});
