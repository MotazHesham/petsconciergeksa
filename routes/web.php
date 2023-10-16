<?php

use App\Models\AboutUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
Route::get('test_mail', 'Frontend\FrontendController@test_mail');

Route::get('admin/logout', 'HomeController@logout')->name('admin.logout');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

//    Route::get('/invoice', 'HomeController@invoice')->name('invoice');
    Route::get('/selectInvoice', 'HomeController@selectInvoice')->name('selectInvoice');
    Route::get('/create_invoice', 'HomeController@create_invoice')->name('invoice');
    Route::get('/selectInvoice2', 'HomeControllxr@selectInvoice2')->name('selectInvoice2');

    Route::resource('settingData', 'SettingDataController');

    Route::delete('invoice/destroy', 'InvoiceController@massDestroy')->name('invoice.massDestroy');
    Route::resource('invoice', 'InvoiceController');
    Route::get('invoice/details/{id}', 'InvoiceController@details')->name('invoice.details');
    Route::post('return/invoice', 'InvoiceController@returnInvoice')->name('return.invoice');
    Route::get('returned/invoice/details/{id}', 'InvoiceController@returnedInvoiceDetails')->name('returned.invoice.details');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    Route::delete('bank/destroy', 'BanksController@massDestroy')->name('bank.massDestroy');
    Route::resource('bank', 'BanksController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Employees
    Route::delete('employee/destroy', 'EmployeeController@massDestroy')->name('employee.massDestroy');
    Route::post('employee/update_statuses', 'EmployeeController@update_statuses')->name('employee.update_statuses');
    Route::resource('employee', 'EmployeeController');

    // clients
    Route::get('clients/active/{id}', 'ClientsController@active')->name('clients.active');
    Route::resource('clients', 'ClientsController');
    Route::delete('contacts/destroy/{id}', 'ClientsController@destroy_contact')->name('contacts.destroy');
    Route::get('contacts', 'ClientsController@contacts')->name('contacts.index');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    
    //Appointment
    Route::get('appointments', 'ClientsController@appointment')->name('appointment.index');
    Route::get('appointments/create', 'ClientsController@addAppointment')->name('appointment.create');
    Route::post('appointments/store', 'ClientsController@storeAppointment')->name('appointment.store');
    Route::post('appointments/update/{id}', 'ClientsController@updateAppointment')->name('appointment.update');
    Route::get('appointments/assign{id}', 'ClientsController@assign')->name('appointment.edit_assign');
    Route::get('appointments/edit{id}', 'ClientsController@editAppointment')->name('appointment.edit');
    Route::post('assignAppointment/{id}', 'ClientsController@assignAppointment')->name('appointment.assign');
    Route::get('appointments/destroy/{id}', 'ClientsController@destroy_appointment')->name('appointment.destroy');
    Route::get('showAppointment/{id}', 'ClientsController@showAppointment')->name('appointment.show');
    Route::post('getPets', 'ClientsController@getPets');

    Route::resource('supplier', 'SupplierController');
    Route::resource('setting', 'SettingController');

    Route::resource('contract', 'ContractTermsController');
    Route::resource('projects', 'ProjectsController');
    Route::delete('/deleteworkingday/{id}','ProjectsController@deleteworkingday')->name('workingday.destroy');
    Route::get('/editworkingday/{id}','ProjectsController@editworkingday')->name('workingday.edit');
    Route::get('/createworkingday/{id}','ProjectsController@createworkingday');
    Route::get('/workingday/{id}','ProjectsController@workingday');
    Route::post('storeworkingday','ProjectsController@storeworkingday');
    Route::post('updateworkingday/{id}','ProjectsController@updateworkingday')->name('workingday.update');

    Route::delete('/deletetasks/{id}','ProjectsController@deleteworkingday')->name('tasks.destroy');
    Route::get('/edittasks/{id}','ProjectsController@edittasks')->name('tasks.edit');
    Route::get('/createtasks/{id}','ProjectsController@createtasks');
    Route::get('/tasks/{id}','ProjectsController@tasks');
    Route::post('storetasks','ProjectsController@storetasks');
    Route::post('updatetasks/{id}','ProjectsController@updatetasks')->name('tasks.update');

    Route::resource('cities', 'CitiesController');
    Route::resource('customers', 'CustomersController');
    Route::resource('types', 'ProjectTypesController');


    //Service
    Route::resource('service', 'ServiceController');
    Route::resource('package', 'PackagesController');

    //About us
    Route::resource('aboutus', 'AboutUsController');

    //category
    Route::resource('category', 'CategoryController');

    //Addon
    Route::post('addon/update_status', 'AddonsController@update_status')->name('addon.update_status');
    Route::resource('addon', 'AddonsController');

    //Gallery
    Route::resource('gallery', 'GalleryController');

    //Slider
    Route::resource('sliders', 'SliderController');

    //Comments
    Route::resource('comments', 'CommentsController');



});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
        Route::get('password',  'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');

});


//Frontend ------------------------------------------------------------------------------------------
Route::get('/verify/{id}','frontend\FrontendController@verify');
Route::get('/resend/{id}','frontend\FrontendController@resend');
Route::post('/storeCode/{id}','frontend\FrontendController@verify');

Route::get('/client/getTime/{date}','frontend\FrontendController@getTime');
Route::post('/client/getPackagePrice','frontend\FrontendController@getPackagePrice');

Route::post('/forget/my/password','frontend\FrontendController@forgetMyPassword');
Route::post('/store/new/password/{id}','frontend\FrontendController@storeNewPassword');


Route::get('/forget/password', function () {
    $aboutus = AboutUs::first();
    return view('frontend.forget',compact('aboutus'));
});
Route::get('/reset/password/{token}/{id}','frontend\FrontendController@resetPassword');


Route::get('/','frontend\FrontendController@index');
Route::get('/soon','frontend\FrontendController@soon');
Route::get('/service','frontend\FrontendController@service');
Route::get('/packages','frontend\FrontendController@package');
Route::get('/gallery','frontend\FrontendController@gallery');
Route::get('/aboutus','frontend\FrontendController@aboutus');
Route::get('/reminder','frontend\FrontendController@reminder');
Route::get('/contact','frontend\FrontendController@contact');
Route::post('/storeContact','frontend\FrontendController@contact');
Route::get('/client/login','frontend\FrontendController@login');
Route::post('/storeLogin','frontend\FrontendController@login');

Route::get('/client/register','frontend\FrontendController@register');
Route::post('/storeClientRegister','frontend\FrontendController@register');


//User
Route::group(['middleware' => 'client', 'prefix' => 'client'], function () {
    Route::get('/add/pet','frontend\FrontendController@addpet');
    Route::get('/petDetails/{id}','frontend\FrontendController@petDetails');
    Route::get('/pet/delete/{id}','frontend\FrontendController@deletePet');
    Route::post('/addpet','frontend\FrontendController@addpets');

    Route::get('/visits','frontend\FrontendController@visits');
    Route::get('/loyalty_cards','frontend\FrontendController@loyalty_cards');

    Route::get('/appointment/{id}','frontend\FrontendController@appointment');
    Route::post('/makeappointment','frontend\FrontendController@makeAppointment');
    Route::post('/bookloyalty','frontend\FrontendController@bookloyalty');
    Route::get('/reminder','frontend\FrontendController@reminder');



    Route::get('/my/pets','frontend\FrontendController@mypets');

    Route::get('/profile','frontend\FrontendController@editUser');
    Route::post('/updateuser','frontend\FrontendController@updateuser');
    Route::post('/storeComment','frontend\FrontendController@storeComment');



    Route::get('/signout','frontend\FrontendController@logout');
});


Route::get('/employee/login','employee\EmployeeDashboardController@login');
Route::post('/storeEmployee','employee\EmployeeDashboardController@login');

Route::group(['middleware' => 'employee', 'prefix' => 'employee'], function () {
    Route::get('system-calendar', 'employee\SystemCalendarController@index')->name('employee.systemCalendar');
    Route::get('/signout','employee\EmployeeDashboardController@logout');
    Route::get('password',  'employee\EmployeeDashboardController@edit')->name('employee.password.edit');
    Route::post('password', 'employee\EmployeeDashboardController@update')->name('employee.password.update');

    Route::get('appointment',  'employee\EmployeeDashboardController@appointment')->name('employee.appointment.index');
    Route::get('todayappointment',  'employee\EmployeeDashboardController@todayappointment')->name('employee.appointment.todayappointment');
    Route::get('appointment/{id}',  'employee\EmployeeDashboardController@editappointment')->name('employee.appointment.edit');
    Route::post('appointment/{id}',  'employee\EmployeeDashboardController@updateappointment')->name('employee.appointment.done');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
