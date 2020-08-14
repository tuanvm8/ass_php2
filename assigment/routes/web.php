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



Route::get('main','HomeController@main');
//category
Route::get('/list','CategoryController@listt')->name('category.list');

Route::get('/add','CategoryController@add')->name('category.add');

Route::get('edit/{id}', 'CategoryController@edit_category');

Route::post('save-category', 'CategoryController@save_category');

Route::post('update-category/{id}', 'CategoryController@update_category');

Route::get('delete-category/{id}','CategoryController@delete');


//product
Route::get('/list_product','ProductController@list_product')->name('product.list_product');

Route::get('/add_product','ProductController@add_product')->name('product.add_product');

Route::get('edit-product/{id}', 'ProductController@edit_product')->name('product.edit_product');

Route::post('save-product', 'ProductController@save_product');

Route::get('delete-product/{id}','ProductController@delete_product');

Route::post('update_product/{id}', 'ProductController@update_product');




Route::get('home','ProductController@index')->name('home');
Route::get('chitiet/{id}','ProductController@detailss');

Route::get('category/{id}','HomeController@view')->name('category');
//login
Route::get('adminlogin','ProductController@getlogin')->name('admin.login');
Route::post('adminlogin','ProductController@postlogin');

//list ra danh sách các sp
Route::get('danhsach','ProductController@listds')->name('danhsach');
//$users = DB::table('users')->count(); lấy ra số lượng
