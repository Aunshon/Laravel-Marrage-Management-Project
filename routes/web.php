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

Route::get('/', function () {
    return view('welcome');
});










// Route::get('/', 'AdminController@index');

Route::get('/add_category', 'CategoryController@addCategory');
Route::post('/save_category', 'CategoryController@saveCategory');

Route::get('/manage_category', 'CategoryController@manageCategory');
Route::get('/edit_category/{edit_id}', 'CategoryController@editCategory');
Route::post('/update_category', "CategoryController@updateCategory");
Route::get('/delete_category/{id}', 'CategoryController@deleteCategory');


Route::get('/add_product', 'ProductController@addProduct');
Route::post('/save_product', 'ProductController@saveProduct');
Route::get('/manage_product', 'ProductController@manageProduct');
Route::get('/view_product/{id}', 'ProductController@viewProduct');
Route::get('/edit_product/{id}', 'ProductController@editProduct');
Route::post('/update_product', 'ProductController@updateProduct');
Route::get('/delete_product/{id}', 'ProductController@deleteProduct');
Route::get('/pmanage_product', 'ProductController@pmanageProduct');

Route::get('/add_celebration_category', 'CelebrationController@addcelebrationcategory');
Route::get('/manage_celebration_category', 'CelebrationController@managecelebrationcategory');
Route::get('/add_celebration_product', 'CelebrationController@addcelebrationproduct');
Route::get('/manage_celebration_product', 'CelebrationController@managecelebrationproduct');

Route::post('/save_celebration_category', 'CelebrationController@save_celebration_category');
Route::post('/update_celebration_category', 'CelebrationController@update_celebration_category');
Route::get('/edit_celebration_category/{id}', 'CelebrationController@edit_celebration_category');
Route::get('/delete_celebration_category/{id}', 'CelebrationController@delete_celebration_category');
Route::post('/save_celebration_product', 'CelebrationController@save_celebration_product');

Route::get('/view_celebration_product/{id}', 'CelebrationController@view_celebration_product');
Route::get('/edit_celebration_product/{id}', 'CelebrationController@edit_celebration_product');
Route::post('/update_celebration_product', 'CelebrationController@update_celebration_product');
Route::get('/delete_celebration_product/{id}', 'CelebrationController@delete_celebration_product');


/* Start Cart Part*/

Route::post('/cart_add', 'CartController@addToCart');
Route::get('/cart_show', 'CartController@cartShow');

/* End Cart Part */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/order/details/{id}', 'UserTypeController@orderdetails');

Route::get( '/whichUser', 'UserTypeController@whichUser')->name( "whichUser");
Route::get( '/user_register', 'UserTypeController@user_register')->name( "user_register");
Route::post( '/user_register_post', 'UserTypeController@user_register_post')->name( 'user_register_post');
Route::get( '/user/home', 'UserTypeController@userhome');
Route::get( '/user/manage/password', 'UserTypeController@managepassword');
Route::post('/change/user/new/password', 'UserTypeController@changeusernewpassword');
Route::post('/set/user/new/password', 'UserTypeController@setusernewpassword');


Route::get('login/google', 'googleLoginController@redirectToProvider');
Route::get('login/google/callback', 'googleLoginController@handleProviderCallback');

Route::get('/celebration' , 'CelebrationController@index');
Route::get('/showCart' , 'CelebrationController@showCart');

Route::get('/watch' , 'CartController@watch');




//Cart
Route::get('/cart' , 'CartController@cart');
Route::get('/addToCart/{productId}' , 'CartController@addToCart');
Route::get('/delereCart/{productId}' , 'CartController@delereCart');
Route::post('/cartUpdate' , 'CartController@cartUpdate');
Route::get('/goToCheckOut' , 'CartController@goToCheckOut');
Route::post('/get/city/name' , 'CartController@getcityname');
Route::post('/place/order', 'CartController@placeorder');
Route::get('/pending/{orderid}', 'CartController@pending');
Route::get('/cusorderdetails/{orderid}', 'CartController@cusorderdetails');


Route::get('/product/{id}' , 'CelebrationController@product');
// Route::get('/maleFasion' , 'CelebrationController@maleFasion');
// Route::get('/maleParlour' , 'CelebrationController@maleParlour');
// Route::get('/jewellary' , 'CelebrationController@jewellary');
// Route::get('/cloth' , 'CelebrationController@cloth');


Route::get('/user/profile' , 'UserTypeController@userprofile');
Route::post('/set/profile' , 'UserTypeController@setprofile');
Route::post('/update/customer/profile' , 'UserTypeController@updatecustomerprofile');


Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
