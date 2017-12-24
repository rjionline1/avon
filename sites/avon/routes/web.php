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

Route::get('/', 'PagesController@getIndex');
Route::get('/routes', 'PagesController@getRoutes');
Route::get('/customers', 'PagesController@getCustomers');
//Route::get('/single', 'PagesController@getSingle')
//Route::get('customers/{id}', ['as' => '/single', 'uses' => 'PagesController@getSingle']);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('customers', 'CustomerController');
Route::resource('sales', 'SalesController');
Route::resource('routes', 'RoutesController');
