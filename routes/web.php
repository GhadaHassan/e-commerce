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
Route::namespace('Dashboard')->prefix('dashboard')->group(function(){

    Route::get('home','HomeController@index');
    
    // Route::resource('users','UsersController')->except(['show','delete']);
    // Route::delete('users/delete/{id}','UsersController@delete')->name('dashboard/users.delete');

    Route::resource('categories','CategoryController')->except(['show','delete']);
    Route::delete('categories/delete/{id}','CategoryController@delete')->name('dashboard/categories.delete');

    Route::resource('sub_categories','Sub_CategoryController')->except(['show','delete']);
    Route::delete('sub_categories/delete/{id}','Sub_CategoryController@delete')->name('dashboard/sub_categories.delete');

    // Route::delete('image/delete/{id}','ToursController@deleteImage')->name('dashboard/image.delete');
    // Route::get('program/{id}','ToursController@updateProgram')->name('dashboard/program.update');


    // Route::resource('customers','CustomersController')->except(['show','delete']);
    // Route::delete('customers/delete/{id}','CustomersController@delete')->name('dashboard/customers.delete');

    
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
