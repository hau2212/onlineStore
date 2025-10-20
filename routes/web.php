<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

#Route::get('/', function () {
#            //return view('welcome');
#            $viewData = [];
#            $viewData["title"] = "Home Page -Online Store";
#            return view('home.index')->with("viewData", $viewData);
#                            }
#            );
Route::get('/' , 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about','App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/product' , 'App\Http\Controllers\ProducController@index') -> name("product.index");
Route::get('/show/{id}' , 'App\Http\Controllers\ProducController@show') -> name("product.show");
#Route::get('/login' , 'App\Http\Controllers\loginController@login') -> name("home.login");
Route::get('/admin' , 'App\Http\Controllers\Admin\AdminHomeController@index') -> name('admin.home.index');
#Route::get('/admin/home' , 'App\Http\Controllers\Admin\AdminHomeController@index') -> name("admin.home.index");
Route::get('/admin/products/' , 'App\Http\Controllers\Admin\AdminProductController@index') -> name("admin.products.index");
Route::post('/admin/products/store' , 'App\Http\Controllers\Admin\AdminProductController@store') -> name('admin.products.store');
Route::delete('/admin/product/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
Route::get('/admin/products/{id}/edit' , 'App\Http\Controllers\Admin\AdminProductController@edit') -> name('admin.products.edit'); 
Route::put('/admin/products/{id}/update' , 'App\Http\Controllers\Admin\AdminProductController@update')-> name('admin.products.update');



Auth::routes();
?>