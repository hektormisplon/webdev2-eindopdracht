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

/** all project pages */
Route::get('discover/details/{id}', 'DiscoveryController@show');
Route::get('discover/details/{id}/pdf', 'DiscoveryController@getPDF');
Route::get('discover/details/{id}/pledge-history', 'DiscoveryController@showPledgeHistory');
Route::get('discover/{category}', 'DiscoveryController@index');
Route::get('discover', 'DiscoveryController@index');

/** news pages */
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

    Route::get('/home', 'HomeController@index')->name('home');

    /** profile */
    Route::resource('profile', 'UserController');

    /** my projects */
    Route::resource('projects', 'ProjectController');

    /** funding */
    Route::patch('/projects/{project}/pledge', 'ProjectPledgeController@pledge');

    /** credits */
    Route::get('credits', 'CreditController@index');
    Route::get('credits/pledge-history', 'CreditController@showPledgeHistory');

    /** payments */
    Route::get('stripe', 'PaymentController@getStripeForm');
    Route::post('stripe', 'PaymentController@postStripePayment')->name('stripe.post');
    Route::post('api/convert', 'APIController@postConvert')->name('converter');

    /** rewards */
    Route::get('rewards', 'RewardsController@index');
});

/**
 * Admin routes
 * - manage users
 */
Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/account', 'AccountController@index');
});
