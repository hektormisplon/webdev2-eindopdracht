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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/news', 'PagesController@news');
Route::get('/privacy-policy', 'PagesController@privacyPolicy');


Route::resource('projects', 'ProjectController');
Route::resource('profile', 'UserController');

Route::get('/pledges', 'ProjectPledgeController@index');
Route::get('/pledges/{pledge}', 'ProjectPledgeController@show');
Route::patch('/pledges/{pledge}', 'ProjectPledgeController@update');
Route::patch('/projects/{project}/pledge', 'ProjectPledgeController@store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/account', 'AccountController@index');
});
