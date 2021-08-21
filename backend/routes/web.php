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
        Route::get('/information/{info_id}', 'InformationController@index')->name('information');

        Route::get('/class', 'ClassController@index')->name('class')->middleware('class');;

        Route::get('/user', 'UserController@index')->name('user');
        Route::get('/user/edit', 'UserController@edit')->name('edit');
        Route::post('/user/edit', 'UserController@update')->name('update');

    });
});

Route::prefix('main')->name('main.')->group(function () {
    Route::get('/', 'Main\MainController@index')->name('top');
    Route::get('/promotion', 'Main\MainController@promotion')->name('promotion');
    Route::get('/purchase_completed', 'Main\MainController@purchaseCompleted')->name('purchase_completed');
    Route::post('/purchase_completed', 'Main\MainController@purchaseCompletedStore')->name('purchase_completed');
    Route::get('/buy', 'Main\MainController@buy')->name('buy');
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

        Route::prefix('class')->name('class.')->group(function () {
            Route::get('/', 'ClassController@index')->name('top');
            Route::get('/create', 'ClassController@create')->name('create');
            Route::post('/store', 'ClassController@store')->name('store');
            Route::get('/edit/{class_id}', 'ClassController@edit')->name('edit');
            Route::post('/update', 'ClassController@update')->name('update');
            Route::post('/delete', 'ClassController@destroy')->name('delete');
            Route::get('/users/{class_id}', 'ClassController@users')->name('users');
            Route::post('/withdrawal', 'ClassController@withdrawal')->name('withdrawal');
        });

        Route::prefix('information')->name('information.')->group(function () {
            Route::get('/', 'InformationController@index')->name('top');
            Route::get('/create', 'InformationController@create')->name('create');
            Route::post('/store', 'InformationController@store')->name('store');
            Route::get('/edit/{info_id}', 'InformationController@edit')->name('edit');
            Route::post('/edit', 'InformationController@update')->name('update');
            Route::post('/delete', 'InformationController@destroy')->name('delete');
        });

        Route::prefix('teachers_messages')->name('teachers_messages.')->group(function () {
            Route::get('/', 'TeachersMessagesController@index')->name('top');
            Route::get('/create', 'TeachersMessagesController@create')->name('create');
            Route::post('/store', 'TeachersMessagesController@store')->name('store');
            Route::get('/edit/{message_id}', 'TeachersMessagesController@edit')->name('edit');
            Route::post('/edit', 'TeachersMessagesController@update')->name('update');
            Route::post('/delete', 'TeachersMessagesController@destroy')->name('delete');
        });

    });

});

