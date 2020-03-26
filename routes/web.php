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
Route::pattern('id', '[0-9]+');
Route::pattern('sort', '[0-9]');
Route::pattern('page', '[0-9]+');

Route::get('/', 'FrontController@index');

Route::get('/contact', 'FrontController@contact');
Route::post('/sendmail', 'ContactController@sendMessage');

Route::get('/product/{id}', 'FrontController@product');
Route::post('/products/category/{id}', 'FrontController@productsCategory');
Route::post('/products', 'FrontController@products');
Route::get('/products/category/{id}', 'FrontController@productsMenu');
Route::get('/products', 'FrontController@productsMenu');
Route::get('/cart', 'FrontController@cart')->middleware(["IsNotLoggedIn"]);
Route::get('/addtocart/{id}', 'CartController@addToCart');
Route::get('/emptycart', 'CartController@emptyCart');
Route::get('/makeorder', 'CartController@makeOrder');

Route::get('/login', 'FrontController@login')->middleware(["IsLoggedIn"]);
Route::get('/registration', 'FrontController@registration')->middleware(["IsLoggedIn"]);
Route::post('/dologin', 'AuthController@login');
Route::get("/logout", "AuthController@logout")->middleware(["IsNotLoggedIn"]);
Route::resource('/insertuser', 'AuthController');
Route::get('/myaccount', 'FrontController@myAccount')->middleware(["IsNotLoggedIn"]);
Route::post('/edituserinfo', 'AuthController@editUserInfo')->middleware(["IsNotLoggedIn"]);

Route::prefix('admin')->middleware(["IsAdmin"])->group(function(){

    Route::get('/', 'AdminController@adminDashboard');
    Route::get('/users', 'AdminController@getUsers');
    Route::get('/deleteuser/{id}', 'AdminuserController@deleteUser');
    Route::get('/edituser/{id}', 'AdminuserController@getEditUser');
    Route::post('/executeedituser', 'AdminuserController@editUser');
    Route::get('/products', 'AdminController@getProducts');
    Route::post('/insertproduct', 'AdminproductController@insert');
    Route::get('/editproduct/{id}', 'AdminproductController@getEditProduct');
    Route::post('/executeeditproduct', 'AdminproductController@editProduct');
    Route::get('/deleteproduct/{id}', 'AdminproductController@deleteProduct');
    Route::get('/categories', 'AdminController@getCategories');
    Route::post('/insertcategory', 'AdmincategoryController@insert');
    Route::get('/editcategory/{id}', 'AdmincategoryController@getEditCategory');
    Route::post('/executeeditcategory', 'AdmincategoryController@editCategory');
    Route::get('/deletecategory/{id}', 'AdmincategoryController@deleteCategory');
    Route::get('/messages', 'AdminController@getMessages');
    Route::get('/slider', 'AdminController@getSlider');
    Route::get('/editslider/{id}', 'AdminsliderController@getEditSlider');
    Route::post('/executeeditslider', 'AdminsliderController@editSlider');
    Route::get('/baners', 'AdminController@getBaners');
    Route::get('/editbaner/{id}', 'AdminsliderController@getEditBaner');
    Route::post('/executeeditbaner', 'AdminsliderController@editBaner');
    Route::get('/sendorder/{id}', 'AdminorderController@sendOrder');
    Route::get('/logs', 'AdminController@getLogs');


});






