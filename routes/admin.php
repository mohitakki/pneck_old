<?php


//dashboard //
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//profile //
Route::get('/myprofile', 'UserController@view')->name('myprofile');

//Get Country State City Dropdown
//Route::get('/getCountries','AdminusersController@getCountries');
Route::get('/getStates/{id}','AdminusersController@geStates');
Route::get('/getCities/{id}','AdminusersController@cities');

//Get Profession Category Catalogue
Route::get('/getCategory/{id}','PneckVendorServiceController@category');

//Pneck Website Routes
Route::get('/contactus', 'PneckwebsiteController@contactus')->name('contactus');
Route::get('/pneckcontactus-edit/{id}', 'PneckwebsiteController@edit')->name('pneckcontactus-edit');
Route::post('/pneckcontactus-update', 'PneckwebsiteController@update')->name('pneckcontactus-update');
Route::get('/pneckcontactus-delete/{id}', 'PneckwebsiteController@delete')->name('pneckcontactus-delete');

Route::get('/application', 'PneckwebsiteController@application')->name('application');
Route::get('/downloadEmpResume/{id}', 'PneckwebsiteController@downloadEmpResume')->name('downloadEmpResume');

//Pneck Vendor State/City Routes
Route::get('/city-create', 'PneckVendorServiceController@createCity')->name('city-create');
Route::post('/city-submit', 'PneckVendorServiceController@submitCity')->name('city-submit');

//Pneck Vendor Services Routes
Route::get('/service-create', 'PneckVendorServiceController@create')->name('service-create');
Route::post('/service-submit', 'PneckVendorServiceController@submit')->name('service-submit');
Route::get('/city-show', 'PneckVendorServiceController@showCity')->name('city-show');
Route::post('/city-delete', 'PneckVendorServiceController@cityDelete')->name('city-delete');

//Pneck Vendor Catalogue Routes
Route::get('/catalogue-create', 'PneckVendorServiceController@createCatalogue')->name('catalogue-create');
Route::post('/catalogue-submit', 'PneckVendorServiceController@submitCatalogue')->name('catalogue-submit');
Route::get('/category-show', 'PneckVendorServiceController@showCategory')->name('category-show');
Route::post('/category-delete', 'PneckVendorServiceController@categoryDelete')->name('category-delete');
Route::get('/catalogue-show', 'PneckVendorServiceController@showCatalogue')->name('catalogue-show');
Route::post('/catalogue-delete', 'PneckVendorServiceController@catalogueDelete')->name('catalogue-delete');
Route::get('/catalogue/{id}','PneckVendorServiceController@catalogue');

//Pneck Users
Route::get('/pneckusers', 'PneckusersController@pneckUsers')->name('pneckusers');
#Route::get('/pneckuser-create', 'PneckusersController@create')->name('user-create');
#Route::post('/pneckuser-submit', 'PneckusersController@submit')->name('user-submit');
Route::get('/pneckuser-check/{id}', 'PneckusersController@check')->name('pneckuser-check');
Route::get('/pneckuser-uncheck/{id}', 'PneckusersController@uncheck')->name('pneckuser-uncheck');
Route::get('/pneckuser-edit/{id}', 'PneckusersController@edit')->name('pneckuser-edit');
Route::post('/pneckuser-update', 'PneckusersController@update')->name('pneckuser-update');
#Route::get('/pneckuser-delete/{id}', 'PneckusersController@delete')->name('user-delete');

//Pneck Employee
Route::get('/pneckemployee', 'PneckemployeeController@pneckEmployee')->name('pneckemployee');
Route::get('/employeelogininfo/{id}', 'PneckemployeeController@employeelogininfo')->name('employeelogininfo');
Route::get('/kycemployee', 'PneckemployeeController@search')->name('kycemployee');
Route::post('/employee-search', 'PneckemployeeController@pneckEmployee')->name('employee-search');
#Route::get('/pneckvendors-create', 'PneckemployeeController@create')->name('user-create');
#Route::post('/pneckvendors-submit', 'PneckemployeeController@submit')->name('user-submit');
Route::get('/pneckemployee-check/{id}', 'PneckemployeeController@check')->name('pneckemployee-check');
Route::get('/pneckemployee-uncheck/{id}', 'PneckemployeeController@uncheck')->name('pneckemployee-uncheck');
Route::get('/pneckemployee-edit/{id}', 'PneckemployeeController@edit')->name('pneckemployee-edit');
Route::post('/pneckemployee-update', 'PneckemployeeController@update')->name('pneckemployee-update');
#Route::get('/pneckuser-delete/{id}', 'PneckemployeeController@delete')->name('user-delete');
Route::get('/employeekyc/{any}/{id}', 'PneckemployeeController@employeekyc')->name('employeekyc');
Route::get('/employeekyc/{id}', 'PneckemployeeController@employeekyc')->name('employeekyc');
Route::post('/pneckemployee-uploadkyc', 'PneckemployeeController@uploadkyc')->name('pneckemployee-uploadkyc');
Route::get('/invoice/{id}','PneckemployeeController@invoice');

//Pneck Vendors
Route::get('/pneckvendors', 'PneckvendorsController@pneckVendors')->name('pneckvendors');
Route::get('/kycvendor', 'PneckvendorsController@search')->name('kycvendor');
Route::post('/vendor-search', 'PneckvendorsController@pneckVendors')->name('vendor-search');
#Route::get('/pneckvendors-create', 'PneckvendorsController@create')->name('user-create');
#Route::post('/pneckvendors-submit', 'PneckvendorsController@submit')->name('user-submit');
Route::get('/pneckvendor-check/{id}', 'PneckvendorsController@check')->name('pneckvendor-check');
Route::get('/pneckvendor-uncheck/{id}', 'PneckvendorsController@uncheck')->name('pneckvendor-uncheck');
Route::get('/pneckvendor-edit/{id}', 'PneckvendorsController@edit')->name('pneckvendor-edit');
Route::post('/pneckvendor-update', 'PneckvendorsController@update')->name('pneckvendor-update');
#Route::get('/pneckuser-delete/{id}', 'PneckvendorsController@delete')->name('user-delete');
Route::get('/vendorkyc/{any}/{id}', 'PneckvendorsController@vendorkyc')->name('vendorkyc');

Route::get('/vendorkyc/{id}', 'PneckvendorsController@vendorkyc')->name('vendorkyc');

Route::post('/vendorkyc-uploadkyc', 'PneckvendorsController@uploadkyc')->name('vendorkyc-uploadkyc');
Route::any('/vendorsrating', 'PneckvendorsController@vendorsrating')->name('vendor-rating');

//Pneck Employee/Orders
Route::get('/ordersemployee', 'PneckemployeeController@ordersemployee')->name('ordersemployee');

//SubAdmin DBM List
Route::get('/dbmlist', 'AdminusersController@dbm')->name('dbmlist');

//SubAdmin distributor List
Route::get('/distributorlist', 'AdminusersController@distributor')->name('distributorlist');
Route::get('/distributorlist/{id}', 'AdminusersController@distributor')->name('distributor-list');

//Admin Agent List
Route::get('/agentlist', 'AdminusersController@agent')->name('agentlist');
Route::get('/agentlist/{id}', 'AdminusersController@agent')->name('agent-list');

//Admin User
Route::get('/users', 'AdminusersController@users')->name('users');
Route::get('/user-search', 'AdminusersController@search')->name('user-search');
Route::post('/user-search', 'AdminusersController@users')->name('user-search');
Route::get('/user-create', 'AdminusersController@create')->name('user-create');
Route::post('/user-submit', 'AdminusersController@submit')->name('user-submit');
Route::get('/user-check/{id}', 'AdminusersController@check')->name('user-check');
Route::get('/user-uncheck/{id}', 'AdminusersController@uncheck')->name('user-uncheck');
Route::get('/user-edit/{id}', 'AdminusersController@edit')->name('user-edit');
Route::post('/user-update', 'AdminusersController@update')->name('user-update');
Route::get('/user-delete/{id}', 'AdminusersController@delete')->name('user-delete');

//roles
Route::get('/roles', 'RolesController@roles')->name('roles');
Route::get('/role-create', 'RolesController@create')->name('role-create');
Route::post('/role-submit', 'RolesController@submit')->name('role-submit');
Route::get('/role-check/{id}', 'RolesController@check')->name('role-check');
Route::get('/role-uncheck/{id}', 'RolesController@uncheck')->name('role-uncheck');
Route::get('/role-edit/{id}', 'RolesController@edit')->name('role-edit');
Route::post('/role-update', 'RolesController@update')->name('role-update');
Route::get('/role-delete/{id}', 'RolesController@delete')->name('role-delete');

//menus
Route::get('/menus', 'MenuController@menus')->name('menus');
Route::get('/menu-check/{id}', 'MenuController@check')->name('menu-check');
Route::get('/menu-uncheck/{id}', 'MenuController@uncheck')->name('menu-uncheck');
Route::post('/menu-update', 'MenuController@update')->name('menu-update');
Route::get('/menu-delete/{id}', 'MenuController@delete')->name('menu-delete');

//General Setting
Route::get('/backend-data', 'GeneralSettingController@view')->name('backend-data');
Route::get('/backend-data-create', 'GeneralSettingController@create')->name('backend-data-create');
Route::post('/backend-data-submit', 'GeneralSettingController@submit')->name('backend-data-submit');
Route::get('/backend-data-check/{id}', 'GeneralSettingController@check')->name('backend-data-check');
Route::get('/backend-data-uncheck/{id}', 'GeneralSettingController@uncheck')->name('backend-data-uncheck');
Route::get('/backend-data-edit/{id}', 'GeneralSettingController@edit')->name('backend-data-edit');
Route::post('/backend-data-update', 'GeneralSettingController@update')->name('backend-data-update');
Route::get('/backend-data-delete/{id}', 'GeneralSettingController@delete')->name('backend-data-delete');


//Banner Setting
Route::get('/banner', 'GeneralSettingController@bannerview')->name('banner');
Route::get('/banner-create', 'GeneralSettingController@bannercreate')->name('banner-create');
Route::post('/banner-submit', 'GeneralSettingController@bannersubmit')->name('banner-submit');
Route::get('/banner-check/{id}', 'GeneralSettingController@bannercheck')->name('banner-check');
Route::get('/banner-uncheck/{id}', 'GeneralSettingController@banneruncheck')->name('banner-uncheck');
Route::get('/banner-edit/{id}', 'GeneralSettingController@banneredit')->name('banner-edit');
Route::post('/banner-update', 'GeneralSettingController@bannerupdate')->name('banner-update');
Route::get('/banner-delete/{id}', 'GeneralSettingController@bannerdelete')->name('banner-delete');

//Category Setting
Route::get('/category', 'CategoryController@view')->name('category');
Route::get('/category-create', 'CategoryController@create')->name('category-create');
Route::post('/category-submit', 'CategoryController@submit')->name('category-submit');
Route::get('/category-edit/{id}', 'CategoryController@edit')->name('category-edit');
Route::post('/category-update', 'CategoryController@update')->name('category-update');
Route::get('/category-delete/{id}', 'CategoryController@delete')->name('category-delete');

//Sub Category Setting
Route::get('/subcategory', 'CategoryController@subview')->name('subcategory');
Route::get('/subcategory-create', 'CategoryController@subcreate')->name('subcategory-create');
Route::post('/subcategory-submit', 'CategoryController@subsubmit')->name('subcategory-submit');
Route::get('/subcategory-edit/{id}', 'CategoryController@subedit')->name('subcategory-edit');
Route::post('/subcategory-update', 'CategoryController@subupdate')->name('subcategory-update');
Route::get('/subcategory-delete/{id}', 'CategoryController@subdelete')->name('subcategory-delete');

// Driver Management
Route::get('/driver', 'DriverController@view')->name('driver');
Route::get('/declined-drivers', 'DriverController@declinedview')->name('declined-drivers');
Route::get('/unverified-drivers', 'DriverController@unverifiedview')->name('unverified-drivers');
Route::get('/driver-create', 'DriverController@create')->name('driver-create');
Route::post('/driver-submit', 'DriverController@submit')->name('driver-submit');
Route::get('/driver-edit/{id}', 'DriverController@edit')->name('driver-edit');
Route::post('/driver-update', 'DriverController@update')->name('driver-update');
Route::get('/driver-delete/{id}', 'DriverController@delete')->name('driver-delete');

// Passanger Management
Route::get('/list-passenger', 'PassengerController@view')->name('list-passenger');
Route::get('/add-passenger', 'PassengerController@addview')->name('add-passenger');
Route::get('/single-passenger/{id}', 'PassengerController@singlepassengerview')->name('single-passenger');
Route::post('/save-passenger', 'PassengerController@savePassenger')->name('save-passenger');
Route::post('/update-passenger', 'PassengerController@updatePassenger')->name('update-passenger');
Route::get('/delete-passenger/{id}', 'PassengerController@deletePassenger')->name('delete-passenger');
// Route::get('/unverified-drivers', 'DriverController@unverifiedview')->name('unverified-drivers');
// Route::get('/driver-create', 'DriverController@create')->name('driver-create');
// Route::post('/driver-submit', 'DriverController@submit')->name('driver-submit');
// Route::get('/driver-edit/{id}', 'DriverController@edit')->name('driver-edit');
// Route::post('/driver-update', 'DriverController@update')->name('driver-update');
// Route::get('/driver-delete/{id}', 'DriverController@delete')->name('driver-delete');

// Corporates Management
Route::get('/corporates', 'CorporatesController@view')->name('corporates');
Route::get('/add-corporates', 'CorporatesController@addview')->name('add-corporates');
Route::get('/corporates-view/{id}', 'CorporatesController@viewdetail')->name('corporates-view');
// Route::get('/unverified-drivers', 'DriverController@unverifiedview')->name('unverified-drivers');
// Route::get('/driver-create', 'DriverController@create')->name('driver-create');
Route::post('/corporates-submit', 'CorporatesController@submit')->name('corporates-submit');
Route::get('/corporates-edit/{id}', 'CorporatesController@edit')->name('corporates-edit');
Route::post('/corporates-update', 'CorporatesController@update')->name('corporates-update');
Route::get('/corporates-delete/{id}', 'CorporatesController@delete')->name('corporates-delete');

// Call Center Management
Route::get('/call', 'CallController@view')->name('call');
Route::get('/add-call', 'CallController@addview')->name('add-call');
// Route::get('/unverified-drivers', 'DriverController@unverifiedview')->name('unverified-drivers');
// Route::get('/driver-create', 'DriverController@create')->name('driver-create');
// Route::post('/driver-submit', 'DriverController@submit')->name('driver-submit');
// Route::get('/driver-edit/{id}', 'DriverController@edit')->name('driver-edit');
// Route::post('/driver-update', 'DriverController@update')->name('driver-update');
// Route::get('/driver-delete/{id}', 'DriverController@delete')->name('driver-delete');

// Sub Admin Management
Route::get('/view-sub-admins', 'SubadminController@view')->name('view-sub-admins');
Route::get('/add-sub-admins', 'SubadminController@addview')->name('add-sub-admins');
// Route::get('/unverified-drivers', 'DriverController@unverifiedview')->name('unverified-drivers');
// Route::get('/driver-create', 'DriverController@create')->name('driver-create');
// Route::post('/driver-submit', 'DriverController@submit')->name('driver-submit');
// Route::get('/driver-edit/{id}', 'DriverController@edit')->name('driver-edit');
// Route::post('/driver-update', 'DriverController@update')->name('driver-update');
// Route::get('/driver-delete/{id}', 'DriverController@delete')->name('driver-delete');

// Vehicle Management
Route::get('/vehicle', 'VehicleController@view')->name('vehicle');
Route::get('/viewVehicleType', 'VehicleController@viewVehicleType')->name('viewVehicleType');


Route::get('/add-vehicle-type', 'VehicleController@addVehicleType')->name('add-vehicle-type');
Route::POST('/submitVehicleType', 'VehicleController@submitVehicleType')->name('submitVehicleType');
Route::get('/deleteVehicleType/{id}', 'VehicleController@deleteVehicleType')->name('deleteVehicleType');
Route::get('/editVehicleType/{id}', 'VehicleController@editVehicleType')->name('editVehicleType');
Route::POST('/changeVehicleType/{id}', 'VehicleController@changeVehicleType')->name('changeVehicleType');
Route::POST('/updateVehicleType', 'VehicleController@updateVehicleType')->name('updateVehicleType');




Route::get('/show-vehicle-type', 'VehicleController@showVehicleType')->name('show-vehicle-type');

Route::get('/', 'VehicleController@addview')->name('add-vehicle');
// Route::get('/unverified-drivers', 'DriverController@unverifiedview')->name('unverified-drivers');
// Route::get('/driver-create', 'DriverController@create')->name('driver-create');
// Route::post('/driver-submit', 'DriverController@submit')->name('driver-submit');
// Route::get('/driver-edit/{id}', 'DriverController@edit')->name('driver-edit');
// Route::post('/driver-update', 'DriverController@update')->name('driver-update');
// Route::get('/driver-delete/{id}', 'DriverController@delete')->name('driver-delete');

// Rental Management
Route::get('/rental', 'RentalController@view')->name('rental');
Route::get('/add-rental', 'RentalController@addview')->name('add-rental');
// Route::get('/unverified-drivers', 'DriverController@unverifiedview')->name('unverified-drivers');
// Route::get('/driver-create', 'DriverController@create')->name('driver-create');
Route::post('/rental-submit', 'RentalController@submit')->name('rental-submit');
Route::get('/rental-edit/{id}', 'RentalController@edit')->name('rental-edit');
Route::post('/rental-update', 'RentalController@update')->name('rental-update');
Route::get('/rental-delete/{id}', 'RentalController@delete')->name('rental-delete');

// Rating
Route::get('/p-rating', 'RatingController@pview')->name('p-rating');
Route::get('/d-rating', 'RatingController@dview')->name('d-rating');
// Route::get('/rating-p-view/{id}', 'RatingController@pviewbyid')->name('rating-p-view');
// Route::get('/d-rating/{id}', 'RatingController@dviewbyid')->name('d-rating');
// Route::get('/unverified-drivers', 'DriverController@unverifiedview')->name('unverified-drivers');
// Route::get('/driver-create', 'DriverController@create')->name('driver-create');
// Route::post('/driver-submit', 'DriverController@submit')->name('driver-submit');
// Route::get('/driver-edit/{id}', 'DriverController@edit')->name('driver-edit');
// Route::post('/driver-update', 'DriverController@update')->name('driver-update');
// Route::get('/driver-delete/{id}', 'DriverController@delete')->name('driver-delete');


//Alert
Route::get('/alerts', 'AlertController@view')->name('alerts');
Route::get('/alert-create', 'AlertController@create')->name('alert-create');
Route::post('/alert-submit', 'AlertController@submit')->name('alert-submit');
Route::get('/alert-check/{id}', 'AlertController@check')->name('alert-check');
Route::get('/alert-uncheck/{id}', 'AlertController@uncheck')->name('alert-uncheck');
Route::get('/alert-edit/{id}', 'AlertController@edit')->name('alert-edit');
Route::post('/alert-update', 'AlertController@update')->name('alert-update');
Route::get('/alert-delete/{id}', 'AlertController@delete')->name('alert-delete');

//Login Log
Route::get('/login-log', 'LogController@login')->name('login-log');
Route::get('/activity-log', 'LogController@activity')->name('activity-log');


//State On Map
Route::get('/map-list', 'LogController@maplist')->name('map-list');
Route::get('/map-driver', 'LogController@mapdriver')->name('map-driver');

// cancel-list
Route::get('/cancel-list', 'LogController@cancellist')->name('cancel-list');
Route::get('/cancel-viewr', 'LogController@canceldriver')->name('cancel-view');

// Rider
Route::get('/ride-history', 'LogController@ridehistory')->name('ride-history');
Route::get('/ride-demond', 'LogController@ridedemond')->name('ride-demond');
Route::get('/ride-airport', 'LogController@rideairport')->name('ride-airport');
Route::get('/rental-ride', 'LogController@rentalride')->name('rental-ride');

Route::get('/restaurant-list', 'RestaurantController@list')->name('restaurant-list');



