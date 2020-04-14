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


Auth::routes();


Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['auth','isVerified','UserLevel']], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    
});

//===================route admin ======================================================================
Route::group(['namespace'=>'Admin','middleware'=>['auth','UserLevel'],'prefix'=>'admin'],function(){
    // Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){

        Route::get('product/viewgallery/{id}','ProductController@viewgallery');
        Route::get('product/gallery/{id}','ProductController@gallery');
        Route::get('product/deletegallery/{id}','ProductController@delete_gallery');
        Route::post('product/upload','ProductController@upload');

        Route::resource('product','ProductController');   
        Route::resource('subcategory','SubcategoryController');   
        Route::resource('attributevalue','AttributevalueController');   

        Route::resource('article','ArticleController');  



        //==========crud ajax ========================
        Route::resource('post','PostController');  
        Route::resource('attribute','AttributeController');   
        Route::resource('role','RoleController');   
        Route::resource('permission','PermissionController');   
        Route::resource('category','CategoryController');   
        Route::resource('information','InformationController');
        Route::resource('tag','TagController');  
        Route::resource('comment','CommentController'); 

        Route::resource('logo','LogoController');  
        Route::post('logo/update', 'LogoController@update')->name('logo.update');
        Route::get('logo/destroy/{id}', 'LogoController@destroy');

        Route::resource('user','UserController');
        Route::post('user/update', 'UserController@update')->name('user.update');
        Route::get('user/destroy/{id}', 'UserController@destroy');
        
        Route::resource('slider','SliderController');
        Route::post('slider/update', 'SliderController@update')->name('slider.update');
        Route::get('slider/destroy/{id}', 'SliderController@destroy');  

        Route::resource('panel','PanleController');
        Route::post('panel/update', 'PanleController@update')->name('panel.update');
        Route::get('panel/destroy/{id}', 'PanleController@destroy');  

        


        //==========search route ===============
        Route::get('searchadmin','AdminController@search')->name('searchadmin');  


        //======test controller =================
        Route::post('post/action', 'PostController@action')->name('action');
        


    });
    













    Route::group(['namespace'=>'User','middleware'=>['auth','UserLevel'],'prefix'=>'user'],function(){
    
        // Route::get('/userpanel', 'PanelController@index');
        
    });
    
    Route::get('/userpanel', 'HomeController@userpanel');


//================================site route==================


// Route::get('/', function () {
//     return view('welcome');
// });

 Route::group(['namespace'=>'Site'],function(){

    Route::resource('/','IndexController');
    Route::resource('site/cat','CategoryController');   
    Route::resource('site/subcat','SubcategoryController');   
    Route::resource('site/element','ProductController');  
    Route::resource('site/weblog','WeblogController');  
    Route::resource('site/contact','ContactController');  
    Route::resource('site/about','AboutController');  
    Route::resource('site/commen','CommentController');  
    Route::resource('site/checkout','CheckoutController');  


//=================search route ========================

    Route::get('/search','IndexController@search')->name('search');


    //==============ajax route =========================
    Route::resource('basket','BasketController')->middleware('auth');   



});

