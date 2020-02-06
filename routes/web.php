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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::prefix('category')->group(function () {
    Route::group(['middleware' => [sprintf('role:%s', \App\Role::ADMIN)]], function () {
        Route::get('/list', 'CategoryController@show')->name("category.show");
        Route::post('/store', 'CategoryController@store')->name("category.store");
        Route::delete('/destroy', 'CategoryController@destroy')->name("category.destroy");
        Route::get("/{slug}/edit", "CategoryController@edit")->name("category.edit");
        Route::put("/{cat}/update", "CategoryController@update")->name("category.update");
    });
});

Route::prefix('user')->group(function () {
    Route::group(['middleware' => [sprintf('role:%s', \App\Role::ADMIN)]], function () {
        Route::get('/list', 'UserController@show')->name('user.show');
        Route::get('/{user}/edit', "UserController@edit")->name('user.edit');
    });
});

Route::prefix('post')->group(function () {
    Route::get('{cat}/{slug}', 'PostController@show')->name("post.show");
    Route::get('/create', "PostController@create")->name("post.create");
    Route::post("/store", "PostController@store")->name("post.store");
    Route::post('/communes', "PostController@communes")->name("loadCommunes");
});