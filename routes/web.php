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

Route::get('/setlocale/{locale}',function($lang){
    Session::put('locale',$lang);
    return redirect()->back();   
});



// Dashboard Routes
Route::group([
    'middleware'=>'language',
    'prefix' => "admin-panel",
    'namespace' => "Admin"  
] , function($router){

    Route::get('' ,'HomeController@show');
    Route::get('login' ,  [ 'as' => 'adminlogin', 'uses' => 'AdminController@getlogin']);
    Route::post('login' , 'AdminController@postlogin');
    Route::get('logout' , 'AdminController@logout');
    Route::get('profile' , 'AdminController@profile');
    Route::post('profile' , 'AdminController@updateprofile');    
    Route::get('databasebackup' , 'AdminController@backup');

    // Users routes for dashboard
    Route::group([
        'prefix' => 'users',
    ] , function($router){
            Route::get('add' , 'UserController@AddGet');
            Route::post('add' , 'UserController@AddPost');
            Route::get('show' , 'UserController@show');
            Route::get('edit/{id}' , 'UserController@edit');
            Route::post('edit/{id}' , 'UserController@EditPost');
            Route::get('details/{id}' , 'UserController@details');
            Route::post('send_notifications/{id}' , 'UserController@SendNotifications');
            Route::get('block/{id}' , 'UserController@block');
            Route::get('active/{id}' , 'UserController@active');
        }
    );

    // admins routes for dashboard
    Route::group([
        'prefix' => "managers",
    ], function($router){
        Route::get('add' , 'ManagerController@AddGet');
        Route::post('add' , 'ManagerController@AddPost');
        Route::get('show' , 'ManagerController@show');
        Route::get('edit/{id}' , 'ManagerController@edit');
        Route::post('edit/{id}' , 'ManagerController@EditPost');
        Route::get('delete/{id}' , 'ManagerController@delete');
    });

    // App Pages For Dashboard
    Route::group([
        'prefix' => 'app_pages'
    ] , function($router){
        Route::get('{section}' , 'AppPagesController@GetSection');
        Route::post('{section}' , 'AppPagesController@PostSection');
    });

    // Setting Route
    Route::get('settings' , 'SettingController@GetSetting');
    Route::post('settings' , 'SettingController@PostSetting');

    // meta tags Route
    Route::get('meta_tags' , 'MetaTagController@getMetaTags');
    Route::post('meta_tags' , 'MetaTagController@postMetaTags');

    // Ads Route
    Route::group([
        "prefix" => "ads"
    ],function($router){
        Route::get('add' , 'AdController@AddGet');
        Route::post('add' , 'AdController@AddPost');
        Route::get('show' , 'AdController@show');
        Route::get('edit/{id}' , 'AdController@EditGet');
        Route::post('edit/{id}' , 'AdController@EditPost');
        Route::get('details/{id}' , 'AdController@details');
        Route::get('delete/{id}' , 'AdController@delete');
    });

    // Categories Route
    Route::group([
        "prefix" => "categories"
    ], function($router){
         Route::get('add' , 'CategoryController@AddGet');
         Route::post('add' , 'CategoryController@AddPost');
         Route::get('show' , 'CategoryController@show');
         Route::get('edit/{id}' , 'CategoryController@EditGet');
         Route::post('edit/{id}' , 'CategoryController@EditPost');
         Route::get('delete/{id}' , 'CategoryController@delete');        
    });


    // Contact Us Messages Route
    Route::group([
        "prefix" => "contact_us"
    ] , function($router){
        Route::get('' , 'ContactUsController@show');
        Route::get('details/{id}' , 'ContactUsController@details');
        Route::get('delete/{id}' , 'ContactUsController@delete');
    });

    // Notifications Route
    Route::group([
        "prefix" => "notifications"
    ], function($router){
        Route::get('show' , 'NotificationController@show');
        Route::get('details/{id}' , 'NotificationController@details');
        Route::get('delete/{id}' , 'NotificationController@delete');
        Route::get('send' , 'NotificationController@getsend');
        Route::post('send' , 'NotificationController@send');
        Route::get('resend/{id}' , 'NotificationController@resend');        
    });

    // News Route
    Route::group([
        "prefix" => "news"
    ], function($router){
        Route::get('show' , 'NewsController@show');
        Route::get('add' , 'NewsController@AddGet');
        Route::post('add' , 'NewsController@AddPost');
        Route::get('edit/{id}' , 'NewsController@EditGet');
        Route::post('edit/{id}' , 'NewsController@EditPost');
        Route::get('delete/{id}' , 'NewsController@delete');         
    });

    // Services Route
    Route::group([
        "prefix" => "charitable_services"
    ], function($router){
        Route::get('show' , 'ServiceController@show');
        Route::get('add' , 'ServiceController@AddGet');
        Route::post('add' , 'ServiceController@AddPost');
        Route::get('edit/{id}' , 'ServiceController@EditGet');
        Route::post('edit/{id}' , 'ServiceController@EditPost');
        Route::get('delete/{id}' , 'ServiceController@delete');         
    });

    // Setting Route
    Route::get('counts' , 'CountController@GetCount');
    Route::post('counts' , 'CountController@PostCount');    

    // products Route
    Route::group([
        "prefix" => "products"
    ], function($router){
        Route::get('show' , 'ProductsController@show');
        Route::get('add' , 'ProductsController@AddGet');
        Route::post('add' , 'ProductsController@AddPost');
        Route::get('edit/{id}' , 'ProductsController@EditGet');
        Route::post('edit/{id}' , 'ProductsController@EditPost');
        Route::get('delete/{id}' , 'ProductsController@delete'); 
        Route::get('images/delete/{id}' , 'ProductsController@DeleteImage');        
    });

    // banks Route
    Route::group([
        "prefix" => "banks"
    ], function($router){
        Route::get('show' , 'BankController@show');
        Route::get('add' , 'BankController@AddGet');
        Route::post('add' , 'BankController@AddPost');
        Route::get('edit/{id}' , 'BankController@EditGet');
        Route::post('edit/{id}' , 'BankController@EditPost');
        Route::get('delete/{id}' , 'BankController@delete');       
    });


    // accounts numbers Route
    Route::group([
        "prefix" => "accounts_numbers"
    ], function($router){
        Route::get('show' , 'AccountNumberController@show');
        Route::get('add' , 'AccountNumberController@AddGet');
        Route::post('add' , 'AccountNumberController@AddPost');
        Route::get('edit/{id}' , 'AccountNumberController@EditGet');
        Route::post('edit/{id}' , 'AccountNumberController@EditPost');
        Route::get('delete/{id}' , 'AccountNumberController@delete');       
    });

    // Orders Route
    Route::group([
        "prefix" => "orders"
    ], function($router){
        Route::get('show' , 'OrderController@show');
        Route::get('details/{id}' , 'OrderController@GetDetails');
        Route::get('delete/{id}' , 'OrderController@delete');       
    });

    // Orders Route
    Route::group([
        "prefix" => "donations"
    ], function($router){
        Route::get('show' , 'DonationController@show');
        Route::get('details/{id}' , 'DonationController@GetDetails');
        Route::get('delete/{id}' , 'DonationController@delete');       
    });    

});



// Web View Routes 
Route::group([
    'prefix' => "webview"
] , function($router){
    Route::get('aboutapp' , 'WebViewController@getabout');
    Route::get('termsandconditions' , 'WebViewController@gettermsandconditions' );
    Route::get('about/{page}' , 'WebViewController@getaboutpages');
    Route::get('services/{id}' , 'WebViewController@getservice');
    Route::get('news/{id}' , 'WebViewController@getnews');
});