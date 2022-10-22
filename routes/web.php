<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Van;
use App\Models\Offer;

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

Route::get('/', function (Request $request) {
   
    return view('index');
});
Route::get('admin/login', function () {
    return view('admin.login');
});

  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/{page}', 'AdminController@index'); 
Route::get('admin/logout', 'logoutController@logout')->name('logout');
Route::resource('companies', 'CompanyController');
Route::resource('services', 'ServiceController');

Route::resource('flights', 'FlightController'); 
Route::get('getLocal', 'FlightController@getLocal');
Route::get('getInternational', 'FlightController@getInternational'); 
Route::get('getHaj', 'FlightController@getHaj'); 
 


Route::resource('tickets', 'TicketController');
Route::get('all', 'TicketController@getallFlayView');
Route::get('local', 'TicketController@getLocalFlayView'); 
Route::get('International', 'TicketController@getInternationalFlayView');
Route::get('Haj', 'TicketController@getHajFlayView');


Route::resource('users','UserController');
Route::resource('payments','PaymentController');
Route::get('payment/{id}', 'PaymentController@getpayment'); 
Route::get('userpayments','PaymentController@userpayments');

Route::resource('hajs','HajController');
Route::get('allhaj', 'HajController@getallhajView');

Route::resource('Reports','ReportsController');

