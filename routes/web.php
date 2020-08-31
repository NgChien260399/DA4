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
//frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search'); //tìm kiếm sản phẩm

//danh mục,thương hiệu sp trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');

//chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');

//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dasboard','AdminController@dashboard');

//danh mục sản phẩm
Route::get('/add-category-product','CategoryProduct@add_category_product');//thêm
Route::get('/all-category-product','CategoryProduct@all_category_product');//hiển thị
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');//sửa
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');//xóa

Route::post('/save-category-product','CategoryProduct@save_category_product');//lưu dữ liệu
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');//cập nhật dữ liệu

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');//ẩn danh mục
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');//hiển thị danh mục


//thương hiệu sản phẩm
Route::get('/add-brand-product','BrandProduct@add_brand_product');//thêm
Route::get('/all-brand-product','BrandProduct@all_brand_product');//hiển thị
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');//sửa
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');//xóa

Route::post('/save-brand-product','BrandProduct@save_brand_product');//lưu dữ liệu
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');//cập nhật dữ liệu

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');//ẩn danh mục
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');//hiển thị danh mục


//Khách hàng
Route::get('/all-customer','CustomerController@all_customer');//hiển thị
Route::get('/add-customer','CustomerController@add_customer');//thêm
Route::get('/edit-customer/{admin_id}','CustomerController@edit_customer');//sửa
Route::get('/delete-customer/{admin_id}','CustomerController@delete_customer');//xóa

Route::post('/save-customer','CustomerController@save_customer');//lưu dữ liệu
Route::post('/update-customer/{admin_id}','CustomerController@update_customer');//cập nhật dữ liệu

//sản phẩm
Route::get('/add-product','ProductController@add_product');//thêm
Route::get('/all-product','ProductController@all_product');//hiển thị
Route::get('/edit-product/{product_id}','ProductController@edit_product');//sửa
Route::get('/delete-product/{product_id}','ProductController@delete_product');//xóa

Route::post('/save-product','ProductController@save_product');//lưu dữ liệu
Route::post('/update-product/{product_id}','ProductController@update_product');//cập nhật dữ liệu

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');//ẩn danh mục
Route::get('/active-product/{product_id}','ProductController@active_product');//hiển thị danh mục


//cart
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');

//check out
Route::get('/login-checkout','CheckoutController@login_checkout'); // đăng nhập người dùng
Route::get('/logout-checkout','CheckoutController@logout_checkout'); //người dùng đăng cuất
Route::post('/add-customer','CheckoutController@add_customer'); //đăng ký customer
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout'); // khách hàng điền thông tin gửi hàng
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer'); // lưu thông tin khách hàng điền thông tin gửi hàng
Route::get('/payment','CheckoutController@payment'); //cách thức thanh toán
Route::post('/order-place','CheckoutController@order_place'); //lưu thông tin đặt hàng

//quản lý đơn hàng
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{orderId}','CheckoutController@view_order');