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

use Illuminate\Support\Facades\Route;

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

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/edit/', 'UserController@edit')->name('edit');
            Route::post('/update/', 'UserController@update')->name('update');
        });



        Route::prefix('coupon')->name('coupon.')->group(function () {
            Route::get('/create', 'CouponController@create')->name('create');
            Route::post('/store', 'CouponController@store')->name('store');
            Route::post('/delete', 'CouponController@delete')->name('delete');
            Route::get('/edit/{id}', 'CouponController@edit')->name('edit');
            Route::post('/update', 'CouponController@update')->name('update');
        });

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
            Route::get('/', 'UserController@index')->name('top');
            Route::get('/create', 'UserController@create')->name('create');
            Route::post('/store', 'UserController@store')->name('store');
            Route::post('/delete', 'UserController@delete')->name('delete');
            Route::get('/edit/{id}', 'UserController@edit')->name('edit');
            Route::post('/update', 'UserController@update')->name('update');
        });

        Route::prefix('coupons')->name('coupons.')->group(function () {
            Route::get('/', 'CouponController@index')->name('top');
            Route::get('/create', 'CouponController@create')->name('create');
            Route::post('/store', 'CouponController@store')->name('store');
            Route::post('/delete', 'CouponController@delete')->name('delete');
            Route::get('/edit/{id}', 'CouponController@edit')->name('edit');
            Route::post('/update', 'CouponController@update')->name('update');
        });

        Route::prefix('tags')->name('tags.')->group(function () {
            Route::get('/', 'TagController@index')->name('top');
            Route::get('/create', 'TagController@create')->name('create');
            Route::post('/store', 'TagController@store')->name('store');
            Route::post('/delete', 'TagController@delete')->name('delete');
            Route::post('/edit', 'TagController@edit')->name('edit');
        });

    });

});

