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
Auth::routes(['register'=>false]);
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', function () { return view('profile');})->name('profile');

    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('edit/user', 'UserController@edit')->name('user.edit');
    Route::post('user/update', 'UserController@update')->name('user.update');

    //Route::resource('shelves', 'ShelfController');
    Route::get('sales/invoice/{id}', 'SaleController@invoice')->name('sales.invoice');
    Route::get('sales/add/{id}', 'SaleController@add')->name('sales.add');
    Route::get('sales/remove/{id}', 'SaleController@remove')->name('sales.remove');
    Route::post('sales/return/{id}', 'SaleController@return')->name('sales.return');
    Route::resource('sales', 'SaleController');
    Route::resource('materials', 'MaterialController');
    Route::resource('firms', 'FirmController');
    Route::get('materials/add/{material}', 'MaterialController@add')->name('materials.add');
    Route::get('materials/category/{category}', 'MaterialController@showCategory')->name('materials.showCategory');
    Route::patch('materials/attach/{material}', 'MaterialController@attach')->name('materials.attach');
    Route::resource('material-categories', 'MaterialCategoryController');
});
