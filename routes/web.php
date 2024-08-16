<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ActiveUser;


Route::group(['prefix' => '/admin'], function(){
    Auth::routes(['register' => false, 'logout' => false]);
    Route::post('/logout', 'App\Http\Controllers\Auth\LogoutController@index')->name('logout');
});
// change language
Route::get('/change-language/{lang}', 'App\Http\Controllers\LanguageController@switchLang')->name('change_language');

// backend or admin
Route::group(['namespace' => 'App\Http\Controllers\Backends', 'prefix' => '/admin' , 'middleware' => [ActiveUser::class]], function(){


    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::post('/test', 'HomeController@test')->name('admin.home.test');

    Route::get('/product', 'ProductController@index')->name('admin.product');
    Route::get('/product/category', 'ProductCategoryController@index')->name('admin.product.category');


    // role
    Route::get('/role','RoleController@index')->name('admin.role');
    Route::get('/role/{role_id}/edit','RoleController@edit')->name('admin.role.edit');
    Route::post('/role/{role_id}/update','RoleController@update')->name('admin.role.update');
    Route::get('/role/{role_id}/delete','RoleController@delete')->name('admin.role.delete');
    Route::get('/role/create','RoleController@create')->name('admin.role.create');
    Route::post('/role/store','RoleController@store')->name('admin.role.store');


    //user
    Route::get('/user','UserController@index')->name('admin.user');
    Route::get('/user/{user_id}/edit','UserController@edit')->name('admin.user.edit');
    Route::post('/user/{user_id}/update','UserController@update')->name('admin.user.update');
    Route::get('/user/{user_id}/delete','UserController@delete')->name('admin.user.delete');
    Route::get('/user/create','UserController@create')->name('admin.user.create');
    Route::post('/user/store','UserController@store')->name('admin.user.store');

});


// front end
Route::group(['namespace' => 'App\Http\Controllers\Frontends'], function(){

    Route::get('/', 'HomeController@index');

});






Route::fallback(function(){
    // return view('404.index');

    return redirect()->route('admin.home');
});
