<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('Vendor/catalogue_load', 'API\VendorController@catalogue_load');
Route::post('Vendor/state_load', 'API\VendorController@state_load');
Route::post('Vendor/city_load', 'API\VendorController@city_load');
Route::post('Vendor/subcat_load', 'API\VendorController@subcat_load');
Route::post('Vendor/show_services', 'API\VendorController@show_services');

Route::post('Vendor/servicesOptions', 'API\VendorController@servicesOptions');
Route::post('Vendor/servicesUpdate', 'API\VendorController@servicesUpdate');

Route::get('Vendor/coreServices', 'API\VendorController@coreServices');

//////////////
Route::post('VendorRegister', 'API\VendorController@signup');
Route::post('getNearByDrivers', 'API\BookingController@getNearByDrivers');
Route::get('fetchVehicleTyle', 'API\VehicleController@fetchVehicleTyle');
Route::post('Vendor/mobile_verify', 'API\VendorController@mobileVerify');
Route::post('Vendor/mobile_otp_resend', 'API\VendorController@mobile_otp_resend');
Route::post('Vendor/login', 'API\VendorController@login');
Route::post('Vendor/logout', 'API\VendorController@logout');
Route::post('Vendor/myprofile', 'API\VendorController@myprofile');
Route::post('Vendor/edit_profile', 'API\VendorController@edit_profile');
Route::post('Vendor/VendorImageUpload', 'API\VendorController@uploadImage');
Route::post('Vendor/deleteImage', 'API\VendorController@deleteImage');
Route::post('Vendor/sendOnlineVendorCurrLocation', 'API\VendorController@AddOnlineVendorCurrLocation');
Route::post('Vendor/change_password', 'API\VendorController@change_password');
Route::post('Vendor/forgotPassWithMobile', 'API\VendorController@forgotPassWithMobile');
Route::post('Vendor/forgotPassMobileVerify', 'API\VendorController@forgotPassMobileVerify');
Route::post('fetchDriversOnDemand', 'API\BookingController@fetchDriversOnDemand');
Route::post('userDevicetoken', 'API\CustomerController@userDevicetoken');

// Feedback
Route::post('Vendor/addFeedback', 'API\VendorController@addFeedback');

///////Booking/////////
Route::post('bookingRatingAdd', 'API\BookingController@bookingRatingAdd');
Route::post('VendorRatingAdd', 'API\BookingController@VendorRatingAdd');
Route::post('userAddFeedback', 'API\CustomerController@userAddFeedback');
Route::post('empAddFeedback', 'API\EmployeeController@empAddFeedback');

Route::post('insertAvailableEmployees', 'API\BookingController@insertAvailableEmployees');
Route::post('fetchAvailableEmployees', 'API\BookingController@fetchAvailableEmployees');
Route::post('fetchOfferedCash', 'API\BookingController@fetchCashOfferedValue');
Route::post('updateOfferedCash', 'API\BookingController@updateCashOfferedValue');

Route::post('fetchAvailableEmployeesWithEmpId', 'API\BookingController@fetchAvailableEmployeesWithEmpId');
Route::post('changeAvailableEmpStatus', 'API\BookingController@changrAvailableEmployeesWithEmpIdStatus');

Route::post('getTrackLocation', 'API\BookingController@currentLocationTrack');
Route::post('updateTrackLocation', 'API\BookingController@currentLocationTrackUpdate');

Route::post('getUserdata', 'API\BookingController@getUserData');
Route::post('getDriverData', 'API\BookingController@getDriverData');

Route::post('getDriverLocation', 'API\BookingController@getDriverLocation');
    
////////Delivery Booking////////
// Route::post('bookingRatingAdd', 'API\DeliveryBookingController@bookingRatingAdd');
// Route::post('VendorRatingAdd', 'API\DeliveryBookingController@VendorRatingAdd');
// Route::post('userAddFeedback', 'API\DeliveryBookingController@userAddFeedback');
// Route::post('empAddFeedback', 'API\DeliveryBookingController@empAddFeedback');

// Route::post('insertAvailableEmployees', 'API\DeliveryBookingController@insertAvailableEmployees');
// Route::post('fetchAvailableEmployees', 'API\DeliveryBookingController@fetchAvailableEmployees');
// Route::post('fetchOfferedCash', 'API\DeliveryBookingController@fetchCashOfferedValue');
// Route::post('updateOfferedCash', 'API\DeliveryBookingController@updateCashOfferedValue');

// Route::post('fetchAvailableEmployeesWithEmpId', 'API\DeliveryBookingController@fetchAvailableEmployeesWithEmpId');
// Route::post('changeAvailableEmpStatus', 'API\DeliveryBookingController@changrAvailableEmployeesWithEmpIdStatus');

// Route::post('getTrackLocation', 'API\DeliveryBookingController@currentLocationTrack');
// Route::post('updateTrackLocation', 'API\DeliveryBookingController@currentLocationTrackUpdate');

// Route::post('getUserdata', 'API\DeliveryBookingController@getUserData');
// Route::post('getDriverData', 'API\DeliveryBookingController@getDriverData');

// Route::post('getDriverLocation', 'API\DeliveryBookingController@getDriverLocation');


//////////Vendor above list///////////////////
Route::post('register', 'API\RegisterController@register');

Route::post('UserOtpSend','API\CustomerController@mobile_otp_send');
Route::post('UserRegister', 'API\CustomerController@register');
Route::post('UserMobileVerify', 'API\CustomerController@mobile_verify');
Route::post('UserOtpResend', 'API\CustomerController@mobile_otp_resend');

///////////Bookinig ORDER COmlete/////////////
Route::post('bookingOtpCheck', 'API\BookingController@bookingOtpCheck');
Route::post('empBookingOtpMatch', 'API\BookingController@empBookingOtpMatch');
Route::post('empBookingOrderAdd', 'API\BookingController@empBookingOrderAdd');
Route::post('empCurrBookingTracking', 'API\BookingController@empCurrBookingTracking');
Route::post('BookingDeliveryOtpMatch', 'API\BookingController@BookingDeliveryOtpMatch');

##USERR##
Route::post('userCurrBookingTracking', 'API\BookingController@userCurrBookingTracking');
Route::post('userBookingPendingStatus', 'API\BookingController@userBookingPendingStatus');
Route::post('userBookingCancel', 'API\BookingController@userBookingCancel');
Route::post('empBookingDeliveryOtpResend', 'API\BookingController@empBookingDeliveryOtpResend');
Route::post('userBookingMarkCompleted', 'API\BookingController@userBookingMarkCompleted');
Route::post('empBookingMarkCompleted', 'API\BookingController@empBookingMarkCompleted');
Route::post('empRequestPaymentAmount', 'API\BookingController@empRequestPaymentAmount');
Route::post('userNearByEmployeesList', 'API\BookingController@userNearByEmployeesList');
Route::post('userNearByVendorList', 'API\BookingController@userNearByVendorList');
Route::post('userGetVendor', 'API\BookingController@userGetVendor');
Route::post('empBookingDeliveryOtpMatch', 'API\BookingController@empBookingDeliveryOtpMatch');
Route::post('testBookingAction', 'API\BookingController@testBookingAction');
Route::post('empMyRides', 'API\BookingController@empMyRides');
Route::post('userMyOrders', 'API\BookingController@userMyOrders');
Route::post('empBookingPaymentStatus', 'API\BookingController@empBookingPaymentStatus');
Route::post('userPaymentProcess', 'API\BookingController@userPaymentProcess');

Route::post('empNearByABooking', 'API\BookingController@empNearByABooking');
Route::post('empBookingAccept', 'API\BookingController@empBookingAccept');
Route::post('empBookingReject', 'API\BookingController@empBookingReject');

Route::post('empConfirmBookingInfo', 'API\BookingController@empConfirmBookingInfo');
Route::post('empConfirmBookingOtpMatch', 'API\BookingController@empConfirmBookingOtpMatch');


Route::post('userLogin', 'API\CustomerController@login');
Route::post('userLogout', 'API\CustomerController@logout');

Route::post('registerbysocial', 'API\CustomerController@registerbysocial');


Route::post('showUserProfile', 'API\CustomerController@show_profile');
Route::post('userResendOtp', 'API\CustomerController@userRegisterResendOtp');// RegisterTime--reseendOTP
Route::post('editUserProfile', 'API\CustomerController@edit_profile');
Route::post('userUploadImage', 'API\CustomerController@userUploadImage');


Route::post('userChanangePassword', 'API\CustomerController@change_pass');
Route::post('userMobileOtpResend', 'API\CustomerController@userMobileOtpResend');


Route::post('userForgotPassWithMobile', 'API\CustomerController@forgot_pass_mobile');

Route::post('userForgotPassVerifyMobile', 'API\CustomerController@forgot_pass_verify_mobile');

Route::post('userBookAorder', 'API\BookingController@user_BookAorder'); //SeperateControllerForOrderLater

Route::post('sendOnlineEmployeesCurrLocation', 'API\BookingController@AddOnlineEmployeesCurrLocation');

Route::post('OnlineEmployeesList', 'API\BookingController@OnlineEmployeesList'); 

/////////EmployeeRegister///////////////

Route::post('EmployeeRegister', 'API\EmployeeController@register');
Route::post('EmployeeMobileVerify', 'API\EmployeeController@mobile_verify');
Route::post('EmployeeLogin', 'API\EmployeeController@emp_login');
Route::post('EmployeeLogout', 'API\EmployeeController@emp_logout');

Route::post('serviceToggle', 'API\EmployeeController@serviceToggle');

#NewLogni api
Route::post('EmployeeOtpResend', 'API\EmployeeController@mobile_otp_resend');
Route::post('ShowEmployeeProfile', 'API\EmployeeController@show_profile');
Route::post('EditEmployeeProfile', 'API\EmployeeController@edit_profile');

Route::post('EmployeeChangePass', 'API\EmployeeController@change_pass');
Route::post('EmployeeForgotPassWithMobile', 'API\EmployeeController@forgot_pass_mobile');
Route::post('EmpForgotPassVerifyMobile', 'API\EmployeeController@forgot_pass_verify_mobile');

//upload image of user as well as vendor
Route::post('ImageUpload', 'API\EmployeeController@uploadImage');

  
Route::middleware('auth:api')->group( function () {
	Route::resource('products', 'API\ProductController');
});

/*Category*/
Route::post('/saveCategory', 'API\CategoryController@addCategory');

Route::post('/categoryList', 'API\CategoryController@categoryList');
Route::get('/categeoryDetails/{id}', 'API\CategoryController@categeoryDetails');
Route::post('/updateCategory/{id}', 'API\CategoryController@updateCategory');
Route::get('/deleteCategory/{id}', 'API\CategoryController@deleteCategory');
Route::get('/activeOrDeactive/{id}/{is_active}', 'API\CategoryController@activeOrDeactive');

Route::get('/vendorHome', 'API\VendorController@vendorHome');

// Search API

Route::post('search', 'API\VendorController@searchList');


/*Product*/
// for php
Route::post('/saveProductimage', 'API\ProducWithCategorytController@imageupload');
// for php
Route::post('/saveProduct', 'API\ProducWithCategorytController@addProduct');
Route::post('/productList', 'API\ProducWithCategorytController@productList');
Route::get('/productDetails/{id}', 'API\ProducWithCategorytController@productDetails');
Route::post('/updateProductDetails/{id}', 'API\ProducWithCategorytController@updateProductDetails');
Route::Post('/deleteProduct', 'API\ProducWithCategorytController@deleteProduct');


/* Order */

Route::post('/orderAdd', 'API\OrderController@orderAdd');
Route::get('/orderList/{id}', 'API\OrderController@orderList');
Route::get('/orderListAll', 'API\OrderController@orderListAll');
Route::get('/orderDelete/{id}', 'API\OrderController@orderDelete');


//Restaurant API

Route::get('/restaurant_list', 'API\RestaurantController@list');
Route::post('/restaurant_dish', 'API\RestaurantController@list_dish');
Route::post('/restaurant_dish_add', 'API\RestaurantController@list_dish_add');
Route::post('/restaurant_dish_edit', 'API\RestaurantController@list_dish_add_edit');
Route::post('/restaurant_dish_delete', 'API\RestaurantController@list_dish_add_delete');
Route::post('/restaurant_add', 'API\RestaurantController@restaurant_detail');
Route::post('/restaurant_detail_without_img', 'API\RestaurantController@restaurant_detail_without_img');
Route::post('/restaurant_shop', 'API\RestaurantController@restaurant_shop');


// User Restaurant API
Route::get('/getcategory', 'API\RestaurantController@getcategory');
Route::post('/getproducts', 'API\RestaurantController@getproducts');
Route::get('/getclosedproducts', 'API\RestaurantController@getclosedproducts');
Route::post('/getopenproductsbycosthightolow', 'API\RestaurantController@getopenproductsbycosthightolow');
Route::post('/getopenproductsbycostlowtohigh', 'API\RestaurantController@getopenproductsbycostlowtohigh');
Route::post('/getopenproductsbydeliverytime', 'API\RestaurantController@getopenproductsbydeliverytime');
Route::post('/getopenproductsbyoffer', 'API\RestaurantController@getopenproductsbyoffer');
Route::post('/getopenproductsbyrating', 'API\RestaurantController@getopenproductsbyrating');
Route::post('/getopenproductsbyrelevance', 'API\RestaurantController@getopenproductsbyrelevance');
Route::post('/getopenproductsbycategory', 'API\RestaurantController@getopenproductsbycategory');
Route::post('/getclosedproductsbycategory', 'API\RestaurantController@getclosedproductsbycategory');
Route::post('/getdishlist', 'API\RestaurantController@getdishlist');
Route::post('/getproductssearch', 'API\RestaurantController@getproductssearch');
Route::post('/getorder', 'API\RestaurantController@getorder');
Route::post('/getorder_shop', 'API\RestaurantController@getorder_shop');
Route::post('/resturant_open', 'API\RestaurantController@resturant_open');
Route::post('/restaurant_available', 'API\RestaurantController@restaurant_available');
Route::post('/order_list', 'API\RestaurantController@order_list');
Route::post('/order_item_list', 'API\RestaurantController@order_item_list');
Route::post('/order_status', 'API\RestaurantController@order_status');
Route::post('/list_dish_edit_without_img', 'API\RestaurantController@list_dish_edit_without_img');
Route::post('/restaurant_available_login', 'API\RestaurantController@restaurant_available_login');
Route::post('/order_cancel_accept', 'API\RestaurantController@order_cancel_accept');
Route::post('/order_list_user', 'API\RestaurantController@order_list_user');
Route::post('/getorder_cod_shop', 'API\RestaurantController@getorder_cod_shop');
Route::post('/getorder_cod', 'API\RestaurantController@getorder_cod');
Route::post('/user_address', 'API\RestaurantController@user_address');
Route::post('/user_address_work', 'API\RestaurantController@user_address_work');
Route::post('/get_user_address', 'API\RestaurantController@get_user_address');
Route::post('/get_user_address_work', 'API\RestaurantController@get_user_address_work');
Route::post('/add_money', 'API\RestaurantController@add_money');
Route::post('/wallet_list', 'API\RestaurantController@wallet_list');
Route::post('/money_send_check_user', 'API\RestaurantController@money_send_check_user');
Route::post('/money_send', 'API\RestaurantController@money_send');
Route::post('/payment_list', 'API\RestaurantController@payment_list');
Route::post('/pneck_user_list', 'API\RestaurantController@pneck_user_list');
Route::post('/getorder_wallet_shop', 'API\RestaurantController@getorder_wallet_shop');
Route::post('/getorder_wallet', 'API\RestaurantController@getorder_wallet');
Route::post('/getNearByDriversList', 'API\RestaurantController@getNearByDriversList');
Route::post('/orderListByStatus', 'API\RestaurantController@orderListByStatus');

// Category list
Route::post('/show_services_gallery', 'API\VendorController@show_services_gallery');

Route::post('/productShopList', 'API\ProducWithCategorytController@productShopList');
Route::post('/productStock', 'API\ProducWithCategorytController@productStock');

Route::post('/notification', 'API\RestaurantController@notification');
Route::post('/emergency_contact', 'API\RestaurantController@emergency_contact');
Route::post('/emergency_contact_list', 'API\RestaurantController@emergency_contact_list');
Route::post('/emergency_contact_delete', 'API\RestaurantController@emergency_contact_delete');
Route::post('/VendorDetail', 'API\VendorController@VendorDetail');

// Delivery Boy
Route::post('/deliveryBoyRequestAction', 'API\RestaurantController@deliveryBoyRequestAction');
Route::post('/deliveryBoyRequestShow', 'API\RestaurantController@deliveryBoyRequestShow');
Route::post('/deliveryBoyShowOrder', 'API\RestaurantController@deliveryBoyShowOrder');
Route::post('/DeliveryToUser', 'API\RestaurantController@DeliveryToUser');
Route::post('/orderStatus', 'API\RestaurantController@orderStatus');
Route::post('/DeliveryBoyOrderList', 'API\RestaurantController@DeliveryBoyOrderList');
Route::post('/DeliveryBoyOrderListItem', 'API\RestaurantController@DeliveryBoyOrderListItem');
Route::post('/DeliveryBoyOrderListShow', 'API\RestaurantController@DeliveryBoyOrderListShow');

// Vendor Shop API
Route::post('/shopOrderList', 'API\RestaurantController@shopOrderList');
Route::post('/ShopOrderStatus', 'API\RestaurantController@ShopOrderStatus');
Route::post('/RestaurantStatus', 'API\RestaurantController@RestaurantStatus');
Route::post('/ShopStatus', 'API\RestaurantController@ShopStatus');
Route::post('/ShopOrderItemList', 'API\RestaurantController@ShopOrderItemList');
Route::post('/ShopOrderListByStatus', 'API\RestaurantController@ShopOrderListByStatus');
Route::post('/getVehicleType', 'API\BookingController@getVehicleType');
Route::post('/setVehicleType', 'API\BookingController@setVehicleType');
Route::post('/VehicleShow', 'API\BookingController@VehicleShow');
Route::post('/UserOrderListDetails', 'API\RestaurantController@UserOrderListDetails');
Route::post('/CancelOrder', 'API\RestaurantController@CancelOrder');

Route::post('/rating', 'API\RestaurantController@rating');
Route::post('/driver_list', 'API\RestaurantController@driver_list');
