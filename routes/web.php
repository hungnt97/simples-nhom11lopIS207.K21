<?php

use Illuminate\Support\Facades\Route;

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
 
Route::get('/', 'IndexController@index');

Route::get('/shop', 'CategoryClientController@index');
Route::get('/design-shirt', 'CategoryClientController@design_shirt');
Route::get('/lien-he', 'IndexController@lien_he');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'IndexController@register');
 
Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});


//danh mục sản phẩm hiển thị trong trang chủ:
Route::get('/danh-muc/{category_id}', 'CategoryClientController@show_category_home');
Route::get('/chi-tiet-san-pham/{product_id}', 'CategoryClientController@details_product');
//end category





//shopping cart
Route::post('/update-cart-quantity', 'CartController@update_cart_quantity');
Route::post('/save-cart', 'CartController@save_cart');
Route::post('/them-cart', 'CartController@them_cart');
Route::post('/them-cart-1', 'CartController@them_cart_1');
Route::post('/them-cart-shop', 'CartController@them_cart_shop');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::get('/delete-to-cart-shop/{rowId}', 'CartController@delete_to_cart_shop');
Route::get('/delete-to-cart-index/{rowId}', 'CartController@delete_to_cart_index');
//endshoppign cart

//check-out
Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::post('/save-checkout', 'CheckoutController@save_checkout');
Route::post('/payment', 'CheckoutController@payment');
Route::get('/payment-success', 'CheckoutController@payment_success');
//end-checkout



//Product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/all-product', 'ProductController@all_product');

Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');
Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');


//Start phần admin
//category product
Auth::routes();
Route::get('/add-category-product', 'CategoryProduct@add_category_product');

Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');// gửi tham số category product ID

Route::get('/all-category-product', 'CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{category_product_id}', 'CategoryProduct@unactive_category_product');// gửi tham số category product ID
Route::get('/active-category-product/{category_product_id}', 'CategoryProduct@active_category_product');

Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');


//Product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/all-product', 'ProductController@all_product');

Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');
Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

//order
Route::get('/details-order', 'OrderController@details_order');
Route::get('/unactive-order/{payment_id}', 'OrderController@unactive_order');
Route::get('/active-order/{payment_id}', 'OrderController@active_order');
Route::get('/delete-order/{payment_id}', 'OrderController@delete_order');
Route::get('/details-of-order/{payment_id}', 'OrderController@details_of_order');

//blog
Route::get('/add-blog', 'BlogController@add_blog');
Route::get('/all-blog', 'BlogController@all_blog');
Route::get('/unactive-blog/{blog_id}', 'BlogController@unactive_blog');
Route::get('/active-blog/{blog_id}', 'BlogController@active_blog');
Route::post('/save-blog', 'BlogController@save_blog');
Route::post('/update-blog/{blog_id}', 'BlogController@update_blog');
Route::get('/edit-blog/{blog_id}', 'BlogController@edit_blog');
Route::get('/delete-blog/{blog_id}', 'BlogController@delete_blog');
Route::get('/blog', 'IndexController@show_blog');
Route::get('/show-blog/{blog_id}', 'IndexController@show_blog_by_id');

//thêm admin


//end phần admin