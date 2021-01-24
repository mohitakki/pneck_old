<?php
use Facade\FlareClient\View;

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


Route::group(['middleware' => 'web'], function () {  
    
Route::get('/', 'Front\FrontController@index');
Route::get('/getStates/{id}','Front\FrontController@geStates');
Route::get('/getCities/{id}','Front\FrontController@cities');
Route::get('/clear', function() {
  $exitCode = Artisan::call('cache:clear');
    echo '<h1>Cache facade value cleared</h1>';
  $exitCode = Artisan::call('route:clear');
    echo '<h1>Route cache cleared</h1>';
  $exitCode = Artisan::call('view:clear');
    echo '<h1>View cache cleared</h1>';
  $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


Route::get('/about', function () {
  return view('front/about_us');
});

Route::post('/vendors-search', 'Front\FrontController@vendor')->name('vendors-search');

Route::get('/vendors-search', 'Front\FrontController@vendor');

Route::get('/vendors', 'Front\FrontController@vendor');
    
Route::get('/vendors/{id}', 'Front\FrontController@vendorCategory');

Route::get('/category/{id}', 'Front\FrontController@category');

Route::get('/vendors_detail/{id}', 'Front\FrontController@vendors_detail');
Route::post('/vendors/cate', 'Front\FrontController@vendorCate');

//Route::get('/vendor_search/{id}', 'Front\FrontController@vendor_search');
Route::get('/vendor_search', 'Front\FrontController@vendor_search');

Route::get('/termsandconditions', 'Front\FrontController@terms');

Route::get('/application', 'Front\FrontController@application');

Route::post('/application', 'Front\FrontController@empApplication')->name('application');

Route::get('/contact', function () {
  return view('front/contact_us');
});

Route::post('contactus', 'Front\FrontController@contactus')->name('contactus');

});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'Admin\Auth\LoginController@login');
  Route::get('/logout', 'Admin\Auth\LoginController@logout')->name('logout');

  Route::get('/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'Admin\Auth\RegisterController@register');

  Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');
  Route::get('/forgot-password', 'Admin\FrontController@menus');
});

/*Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin', 'Admin\DashboardController@index')->name('admin');
});*/
