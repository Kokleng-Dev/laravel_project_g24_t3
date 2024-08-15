<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/admin'], function(){
    Auth::routes(['register' => false, 'logout' => false]);
    Route::post('/logout', 'App\Http\Controllers\Auth\LogoutController@index')->name('logout');
});
// change language
Route::get('/change-language/{lang}', 'App\Http\Controllers\LanguageController@switchLang')->name('change_language');

// backend or admin
Route::group(['namespace' => 'App\Http\Controllers\Backends', 'prefix' => '/admin'], function(){


    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::post('/test', 'HomeController@test')->name('admin.home.test');

    Route::get('/product', 'ProductController@index')->name('admin.product');
    Route::get('/product/category', 'ProductCategoryController@index')->name('admin.product.category');




});


// front end
Route::group(['namespace' => 'App\Http\Controllers\Frontends'], function(){

    Route::get('/', 'HomeController@index');

});






Route::fallback(function(){
    // return view('404.index');

    return redirect()->route('admin.home');
});
