<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', function () { return view('profile');})->name('profile');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('edit/user', 'UserController@edit')->name('user.edit');
Route::post('user/update', 'UserController@update')->name('user.update');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('shelves', 'ShelfController');
Route::resource('sales', 'SaleController');
Route::resource('materials', 'MaterialController');
Route::resource('material-categories', 'MaterialCategoryController');
