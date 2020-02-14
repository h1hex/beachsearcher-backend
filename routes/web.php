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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/reviews/add', 'HomeController@addReview')->name('home.add.review');

Route::group([
    'prefix' => 'admin',
    'middleware' => 'admin',
    'namespace' => 'Admin'
], function (){
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('/beaches', 'BeachController', ['as' => 'admin']);
    Route::resource('/cities', 'CityController', ['as' => 'admin']);
    Route::resource('/users', 'UserController', ['as' => 'admin']);
    Route::resource('/catalogs', 'CatalogController', ['as' => 'admin']);
    Route::resource('/reviews', 'ReviewController', ['as' => 'admin']);
});