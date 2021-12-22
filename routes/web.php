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

Route::get('/', 'ContentController@getHome')->name('home');
Route::get('/about', 'AboutController@main')->name('about');
Route::get('/contact', 'ContactController@main')->name('contact');
Route::post('/contact/add', 'ContactController@postContactAdd')->name('contact_add');


// Module Cart
Route::get('/cart', 'CartController@getCart')->name('cart');
Route::post('/cart', 'CartController@postCart')->name('cart');
Route::post('/cart/product/{id}/add', 'CartController@postCartAdd')->name('cart_add');
Route::post('/cart/item/{id}/update', 'CartController@postCartItemQuantityUpdate')->name('cart_item_update');
Route::get('/cart/item/{id}/delete', 'CartController@getCartItemDelete')->name('cart_item_delete');
Route::get('/cart/{order}/type/{type}', 'CartController@getCartChangeType')->name('cart');

//

// Module Store
Route::get('/store', 'StoreController@getStore')->name('store');
Route::get('/store/category/{id}/{slug}', 'StoreController@getCategory')->name('store_category');
Route::post('/search', 'StoreController@postSearch')->name('search');


// Router Auth
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login', 'ConnectController@postLogin')->name('login');
Route::get('/recover', 'ConnectController@getRecover')->name('recover');
Route::post('/recover', 'ConnectController@postRecover')->name('recover');
Route::get('/reset', 'ConnectController@getReset')->name('reset');
Route::post('/reset', 'ConnectController@postReset')->name('reset');
Route::get('/register', 'ConnectController@getRegister')->name('register');
Route::post('/register', 'ConnectController@postRegister')->name('register');
Route::get('/logout', 'ConnectController@getLogout')->name('logout');

// Module Products
Route::get('/product/{id}/{slug}', 'ProductController@getProduct')->name('product_single');

// Module User Actions
Route::get('/account/edit', 'UserController@getAcccountEdit')->name('account_edit');
Route::post('/account/edit/avatar', 'UserController@postAccountAvatar')->name('account_avatar_edit');
Route::post('/account/edit/password', 'UserController@postAccountPassword')->name('account_password_edit');
Route::post('/account/edit/info', 'UserController@postAccountInfo')->name('account_info_edit');
Route::get('/account/address', 'UserController@getAcccountAddress')->name('account_address');
Route::post('/account/address/add', 'UserController@postAcccountAddressAdd')->name('account_address');
Route::get('/account/address/{address}/setdefault', 'UserController@getAcccountAddressSetDefault')->name('account_address');
Route::get('/account/address/{address}/delete', 'UserController@getAcccountAddressDelete')->name('account_address');
Route::get('/account/history/orders', 'UserOrderController@getHistory')->name('account_user_orders_history');
Route::get('/account/history/order/{order}', 'UserOrderController@getOrder')->name('account_user_order_details');

// Ajax Api Routers
Route::get('/md/api/load/products/{section}', 'ApiJsController@getProductsSection');
Route::post('/md/api/load/user/favorites', 'ApiJsController@postUserFavorites');
Route::post('/md/api/favorites/add/{object}/{module}', 'ApiJsController@postFavoriteAdd');
Route::post('/md/api/load/product/inventory/{inv}/variants', 'ApiJsController@postProductInventoryVariants');
Route::post('/md/api/load/cities/{state}', 'ApiJsController@postCoverageCitiesFromState');


// E-MAIL VERIFICATION

Route::get('register/verify/{code}', 'Auth\RegisterController@verify');