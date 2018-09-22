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
        // Cart - ajax
        Route::post('/add', 'CartController@addToCart')->name('cart.add');
        Route::post('/remove', 'CartController@removeItem')->name('cart.remove');
        Route::post('/update', 'CartController@updateItem')->name('cart.update');
        Route::post('/remove-all', 'CartController@removeAllItems')->name('cart.remove_all');

        /**
         * Product
         */
        // Product detail
        Route::get('/product-detail/{slug}', 'ProductController@showProductDetail')->name('product.detail');
        // Products in category
        Route::get('category/{slug}', 'ProductController@showProductInCategory')->name('product.list.category');
        // Products in brand
        Route::get('brand/{slug}', 'ProductController@showProductInBrand')->name('product.list.brand');
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
            Route::get('/list-product', 'ProductController@showList')->name('product.list');

            Route::post('/list-product', 'ProductController@search')->name('product.search');

            Route::get('/add-product', 'ProductController@showAddForm')->name('product.add.show');

            Route::post('/add-product', 'ProductController@addProduct')->name('product.add.handle');

            Route::post('/delete-product', 'ProductController@deleteProduct')->name('product.delete.handle');

            //service
            Route::resource('service', 'ServiceController');

            Route::delete('service', 'ServiceController@delete')->name('service.delete');

            Route::get('{id}/edit', 'ProductController@showEditForm')->name('product.edit.show');

            Route::post('/edit', 'ProductController@editProduct')->name('product.edit.handle');

        });
    });



