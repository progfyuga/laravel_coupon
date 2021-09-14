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

Route::namespace('User')->prefix('member')->name('member.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        Route::get('/', 'MemberController@index')->name('top');

        Route::get('/user', 'UserController@index')->name('user');
        Route::get('/user/edit', 'UserController@edit')->name('edit');
        Route::post('/user/edit', 'UserController@update')->name('update');

    });

});

Route::get('/', 'Main\MainController@index')->name('top');

Route::prefix('main')->name('main.')->group(function () {
    Route::get('/', 'Main\MainController@index')->name('top');
    Route::get('/key_word', 'Main\MainController@key_word')->name('key_word');
    Route::get('/coupon_detail/{id}', 'Main\CouponsController@index')->name('coupon_detail');
    Route::get('/user_detail/{id}', 'Main\UserController@index')->name('user_detail');
});


// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        Route::get('/', 'AdminController@index');


        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', 'UsersController@index')->name('top');
            Route::get('/detail/{user_id}', 'UsersController@detail')->name('detail');
            Route::get('/add_class/{user_id}', 'UsersController@add_class')->name('add_class');
            Route::post('/add_class_store/', 'UsersController@add_class_store')->name('add_class_store');
        });

        Route::prefix('coupons')->name('coupons.')->group(function () {
            Route::get('/', 'CouponsController@index')->name('top');
            Route::get('/create', 'CouponsController@create')->name('create');
            Route::post('/store', 'CouponsController@store')->name('store');
            Route::post('/delete', 'CouponsController@delete')->name('delete');
            Route::get('/edit/{id}', 'CouponsController@edit')->name('edit');
            Route::post('/update', 'CouponsController@update')->name('update');
        });

        Route::prefix('tags')->name('tags.')->group(function () {
            Route::get('/', 'TagsController@index')->name('top');
            Route::get('/create', 'TagsController@create')->name('create');
            Route::post('/store', 'TagsController@store')->name('store');
            Route::post('/delete', 'TagsController@delete')->name('delete');
            Route::post('/edit', 'TagsController@edit')->name('edit');
        });

    });

});

