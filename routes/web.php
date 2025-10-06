<?php

use Illuminate\Support\Facades\Route;

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


