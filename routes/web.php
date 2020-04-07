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

        

        Route::resource('panel','PanleController');
        Route::resource('product','ProductController');   
        Route::resource('role','RoleController');   
        Route::resource('user','UserController');   
        Route::resource('permission','PermissionController');   
        Route::resource('category','CategoryController');   
        Route::resource('subcategory','SubcategoryController');   
        Route::resource('attribute','AttributeController');   
        Route::resource('attributevalue','AttributevalueController');   
        Route::resource('tag','TagController');  
        Route::resource('slider','SliderController');  
        Route::resource('information','InformationController');
        Route::resource('logo','LogoController');  
        Route::resource('article','ArticleController');  
        Route::resource('comment','CommentController'); 

        //==========crud ajax ==============
        Route::resource('post','PostController');  

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




    





    //==============ajax route =========================
    Route::resource('basket','BasketController')->middleware('auth');   



});

