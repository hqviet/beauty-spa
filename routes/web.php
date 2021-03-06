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

Route::group(
    [
        'namespace'  => 'Front',
        'as'         => 'front.'
    ],function () {
        Route::get('/', 'HomeController@index')->name('index');

        /**
         * Cart
         */
        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
        Route::post('/checkout', 'CartController@checkoutHandler')->name('cart.checkout.handle');
        // Cart - ajax
        Route::post('/add', 'CartController@addToCart')->name('cart.add');
        Route::post('/remove', 'CartController@removeItem')->name('cart.remove');
        Route::post('/update', 'CartController@updateItem')->name('cart.update');
        Route::get('/remove-all', 'CartController@removeAllItems')->name('cart.removeAll');
        /**
         * Product
         */
        // Product detail
        Route::get('/product-detail/{slug}', 'ProductController@showProductDetail')->name('product.detail');
        // Products in category
        Route::get('category/{slug}', 'ProductController@showProductInCategory')->name('product.list.category');
        // Products in brand
        Route::get('brand/{slug}', 'ProductController@showProductInBrand')->name('product.list.brand');

        Route::get('service', 'ServiceController@service')->name('service');

        Route::get('category-service/{slug}', 'ServiceController@category')->name('category-service');

        Route::get('service-detail/{slug}', 'ServiceController@serviceDetail')->name('service-detail');

        Route::get('login', 'UserController@login')->name('login');

        Route::post('login', 'UserController@processLogin')->name('login');

        Route::post('register', 'UserController@processRegister')->name('register');

        Route::get('logout', 'UserController@logout')->name('logout');

        Route::get('logout', 'UserController@logout')->name('logout');

        Route::post('set-schedule', 'UserController@setSchedule')->name('set-schedule');

        Route::group(['middleware' => 'user'], function() {

            Route::get('user', 'UserController@getInfoUser')->name('info-user');

            Route::post('user', 'UserController@postInfoUser')->name('info-user');
        });

        Route::get('search', 'HomeController@search')->name('search');

    });

Route::group(
    [
        'middleware' => ['web'],
        'namespace'  => 'Admin',
        'prefix'     => 'admin',
        'as'         => 'admin.'
    ],
    function () {

        Route::get('login', 'Auth\LoginController@login')->name('login');

        Route::post('login', 'Auth\LoginController@processLogin')->name('login.post');

        Route::middleware(['sentinel.login'])->group(function () {

            Route::get('/', 'HomeController@index')->name('dashboard');

            Route::get('logout', 'Auth\LoginController@logout')->name('logout');

            // profile
            Route::get('profile', 'Auth\ProfileController@profile')->name('profile');

            Route::post('account', 'Auth\ProfileController@profileUpdate')->name('profile.post');

            Route::post('change-password', 'Auth\ProfileController@changePassword')->name('profile.change-password');

            //product
            Route::get('/product/list', 'ProductController@showList')->name('product.list');

            // Route::post('/product/list', 'ProductController@search')->name('product.search');

            Route::get('/product/add', 'ProductController@showAddForm')->name('product.add.show');

            Route::post('/product/add', 'ProductController@addProduct')->name('product.add.handle');

            Route::post('/product/delete', 'ProductController@deleteProduct')->name('product.delete.handle');

            //service
            Route::resource('service', 'ServiceController');

            Route::put('service/edit-service/{id}', 'ServiceController@update')->name('service.service_edit');

            Route::delete('service', 'ServiceController@delete')->name('service.delete');

            //schedule
            Route::resource('schedule', 'ScheduleController')->except([
                'destroy'
            ]);

            Route::delete('schedule', 'ScheduleController@delete')->name('schedule.delete');


            Route::get('/product/edit/{id}', 'ProductController@showEditForm')->name('product.edit.show');

            Route::post('/product/edit', 'ProductController@editProduct')->name('product.edit.handle');

            Route::get('/user/list', 'UserController@showList')->name('user.list');

            Route::get('/user/add', 'UserController@showAddForm')->name('user.add.show');

            Route::post('/user/add', 'UserController@addUser')->name('user.add.handle');

            Route::get('/user/edit/{id}', 'UserController@showEditForm')->name('user.edit.show');

            Route::post('/user/edit', 'UserController@editUser')->name('user.edit.handle');

            Route::get('/order/list', 'OrderController@showList')->name('order.list');

            // Route::get('order/edit/{id}', 'OrderController@showEditForm')->name('order.edit.show');
            
            Route::post('order/delete', 'OrderController@deleteOrder')->name('order.delete.handle');

            Route::post('order/check', 'OrderController@checkOrder')->name('order.check.handle');

        });
    });



