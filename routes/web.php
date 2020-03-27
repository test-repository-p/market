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

Auth::routes();


Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['auth','isVerified']], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    
});

//===================route admin ======================================================================
// Route::group(['namespace'=>'Admin','middleware'=>['auth','UserLevel'],'prefix'=>'admin'],function(){
    Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){

        Route::get('product/viewgallery/{id}','ProductController@viewgallery');
        Route::get('product/gallery/{id}','ProductController@gallery');
        Route::get('product/deletegallery/{id}','ProductController@delete_gallery');
        Route::post('product/upload','ProductController@upload');


        Route::resource('panel','PanleController');
        Route::resource('product','ProductController');   
        Route::resource('role','RoleController');   
        Route::resource('user','UserController');   
        Route::resource('permission','PermissionController');   
        Route::resource('category','CategoryController');   
        Route::resource('subcategory','SubcategoryController');   
        Route::resource('attribute','AttributeController');   
        Route::resource('tag','TagController');  
        Route::resource('slider','SliderController');   
    });
    