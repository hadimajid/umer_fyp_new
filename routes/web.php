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

Route::get('/optimize', 'FrontController@optimize');

Route::get('/my-dashboard/credit/deposit', 'UserDashboardController@deposit')->name('userdash.creditdep');
Route::post('/my-dashboard/credit/deposit', 'UserDashboardController@depositamount')->name('userdash.creditdepamount');
Route::post('/my-dashboard/credit/deposit/success/{amount}', 'UserDashboardController@depositamountsuccess')->name('userdash.creditdepositedsuccess');
Route::get('/my-dashboard/credit/withdraw', 'UserDashboardController@creditwithdraw')->name('userdash.creditwithdraw');
Route::get('/my-dashboard/hopee/withdraw', 'UserDashboardController@hopeewithdraw')->name('userdash.hopeewithdraw');
Route::post('/my-dashboard/credit/withdraw/request', 'UserDashboardController@creditwithdrawalrequest')->name('userdash.creditwithdrawalrequest');
Route::post('/my-dashboard/hopee/withdraw/request', 'UserDashboardController@hopeewithdrawalrequest')->name('userdash.hopeewithdrawalrequest');


Route::get('/my-dashboard/active', 'UserDashboardController@active')->name('userdash.active');
Route::get('/my-dashboard/active/{set}', 'UserDashboardController@perday')->name('userdash.perday');
Route::get('/my-dashboard/active/payment/{set}', 'UserDashboardController@payment')->name('userdash.payment');
//Route::get('/my-dashboard/active/{set}', 'UserDashboardController@activeShow')->name('userdash.activeshow');
Route::get('/my-dashboard/registered', 'UserDashboardController@registered')->name('userdash.registered');
Route::get('/my-dashboard/history', 'UserDashboardController@history')->name('userdash.history');
Route::get('/my-dashboard/ratings', 'UserDashboardController@rating')->name('userdash.rating');
Route::get('/my-dashboard/notification', 'UserDashboardController@notification')->name('userdash.notification');
Route::get('/my-dashboard/notification/{id}', 'UserDashboardController@notificationDetails')->name('userdash.notificationDetails');

Route::post('/registration/{set}', 'FrontSetController@registration')->name('frontset.register');
Route::post('/hopeefeed/{hopee}', 'FrontSetController@hopeefeedupdate')->name('frontset.feedupdate');
Route::post('/registration/security/{set}', 'FrontSetController@security')->name('frontset.security');

Route::get('/kameeti', 'UserDashboardController@kameeti')->name('user.kameeti');
Route::get('/get-kameeti-list', 'UserDashboardController@getKameetiList')->name('user.kameetiList');
Route::get('/get-kameeti-register/{kameeti_id}', 'UserDashboardController@getRegisterKameeti')->name('user.getRegisterKameeti');
Route::post('/kameeti-register/{kameeti_id}', 'UserDashboardController@registerKameeti')->name('user.registerKameeti');
Route::get('/budget', 'UserDashboardController@budget')->name('user.budget');
Route::get('/loan', 'UserDashboardController@loan')->name('user.loan');
Route::post('/loan', 'UserDashboardController@submitLoan');




Route::get('/', 'FrontController@index')->name('front.index');
//Route::get('/set/{set}', 'FrontController@show')->name('front.show');
Route::get('/about-us', 'FrontController@about')->name('front.about');
Route::get('/latest', 'FrontController@latest')->name('front.latest');
Route::get('/feedbacks', 'FrontController@feedbacks')->name('front.feedbacks');
Route::get('/contact-us', 'FrontController@contact')->name('front.contact');
Route::post('/contact-us', 'FrontController@contactUs');

Route::get('/admin-image/{set}', 'AdminDashboardController@image')->name('admin.image');
Route::get('/admin-login', 'admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin-image/{set}', 'AdminDashboardController@imageupload')->name('admin.imageupload');
Route::post('/admin-login', 'admin\Auth\LoginController@login');
Route::get('/admin-active', 'AdminDashboardController@active')->name('admindash.active');
Route::get('/admin-registration', 'AdminDashboardController@registration')->name('admindash.registration');
Route::get('/admin-history', 'AdminDashboardController@history')->name('admindash.history');
Route::get('/admin-active-user', 'AdminDashboardController@activeUsers')->name('admindash.activeuser');
Route::get('/admin-inactive-user', 'AdminDashboardController@inactiveUsers')->name('admindash.inactiveuser');
Route::get('/admin-create', 'AdminDashboardController@create')->name('admindash.create');
Route::post('/admin-create', 'AdminDashboardController@store')->name('admindash.store');
Route::get('/admin-registration/{set}/edit', 'AdminDashboardController@edit')->name('admindash.edit');
Route::patch('/admin-registration/{set}', 'AdminDashboardController@update')->name('admindash.patch');
Route::get('/admin-add-kameeti', 'AdminDashboardController@addKameeti')->name('admin.addKameeti');
Route::post('/admin-add-kameeti', 'AdminDashboardController@submitKameeti');
Route::get('/admin-kameeti-list', 'AdminDashboardController@kameetiList')->name('admin.kameetiList');
Route::get('/admin-kameeti-update/{id}', 'AdminDashboardController@updateKameeti')->name('admin.updateKameeti');
Route::put('/admin-kameeti-update/{id}', 'AdminDashboardController@submitUpdateKameeti');
Route::delete('admin-kameeti-delete/{id}','AdminDashboardController@deleteKameeti')->name('admin.deleteKameeti');
Route::get('/admin-kameeti-request-list', 'AdminDashboardController@kameetiRequestList')->name('admin.kameetiRequestList');
Route::post('admin-kameeti-register-reject/{user_id}/{kameeti_id}','AdminDashboardController@rejectKameetiRegister')->name('admin.rejectKameetiRegisterReject');
Route::post('admin-kameeti-register-approve/{user_id}/{kameeti_id}','AdminDashboardController@approveKameetiRegister')->name('admin.approveKameetiRegisterReject');
Route::get('/admin-loan-request-list', 'AdminDashboardController@loanRequestList')->name('admin.loanRequestList');
Route::post('admin-loan-register-reject/{user_id}/{loan_id}','AdminDashboardController@rejectLoanRegister')->name('admin.rejectLoanRegisterReject');
Route::post('admin-loan-register-approve/{user_id}/{loan_id}','AdminDashboardController@approveLoanRegister')->name('admin.approveLoanRegisterReject');
Auth::routes(['verify'=> true]);
Route::get("test",function (){
   var_dump($_SERVER);
});
//Route::get('/login', 'LoginController@index')->name('login');
