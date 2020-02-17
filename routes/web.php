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
Route::post('/search', "HomeController@search")->name("home.search");

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
    });
    Route::group(['middleware' => "auth"], function() {
        Route::post('/{user}/savemeta', 'UserController@storeMeta')->name('user.meta');
        Route::get('/{user}/edit', "UserController@edit")->name('user.edit');
        Route::put('/{user}/store', 'UserController@store')->name('user.store');
    });
});

Route::prefix('post')->group(function () {
    Route::get('/create', "PostController@create")->name("post.create");
    Route::post("/store", "PostController@store")->name("post.store");
    Route::post("/storeUser")->name("post.storeUser");
    Route::post('/communes', "PostController@communes")->name("loadCommunes");
    Route::get('/{slug}', 'PostController@show')->name("post.show");
});

Route::get("/images/post/{attachment}", function ($attachment) {
    $file = sprintf("storage/post/%s", $attachment);


    if (File::exists($file)) {
        return \Intervention\Image\Facades\Image::make($file)->response();
    }
});