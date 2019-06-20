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

// Route::get('/', function () {
//     return view('welcome');
// });
 
Auth::routes();
Route::get('/', 'WelcomeController@index')->name(''); 
Route::get('/RoomController', 'RoomController@index')->name('RoomController');
Route::get('/TypeController', 'TypeController@index')->name('TypeController');
Route::get('/CapacityController', 'CapacityController@index')->name('CapacityController');
Route::get('/PricelistController', 'PricelistController@index')->name('PricelistController');
Route::get('/bookingController', 'bookingController@index')->name('bookingController');
Route::get('/customermanager', 'CustomerController@index')->name('CustomerController');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('addhotel','HomeController@Addhotel');
Route::post('edithotel','HomeController@edithotel'); 
Route::post('updateimage','HomeController@updateimage');

Route::post('updatetype','TypeController@updatetype');
Route::post('Addtype','TypeController@Addtype');
Route::get('/Deltype/{ID}','TypeController@Deltype');


Route::post('updatecapacity','CapacityController@updatecapacity');
Route::post('Addcapacity','CapacityController@Addcapacity');
Route::get('/Delcapacity/{ID}','CapacityController@Delcapacity');


Route::post('Addroom','RoomController@Addroom');
Route::get('/Delroom/{ID}','RoomController@Delroom');
Route::get('/editroom/{ID}','RoomController@editroom');
Route::post('saveeditRoom','RoomController@saveeditRoom');
Route::post('updateroomimage','RoomController@updateroomimage');

Route::post('Addplist','PricelistController@Addplist');
Route::get('/Delplist/{ID}','PricelistController@Delplist');
Route::get('/editplist/{ID}','PricelistController@editplist');
Route::post('saveeditplist','PricelistController@saveeditplist');



Route::get('/Delbooking/{ID}','bookingController@Delbooking');
Route::get('/updatebooking/{ID}','bookingController@updatebooking');
Route::post('saveeditbooking','bookingController@saveeditbooking');



Route::post('AddCustomer','CustomerController@AddCustomer');
Route::get('/DelCustomer/{ID}','CustomerController@DelCustomer');
Route::get('/editCustomer/{ID}','CustomerController@editCustomer');
Route::post('saveeditCustomer','CustomerController@saveeditCustomer');

Route::post('viewrooms','WelcomeController@viewrooms');
Route::post('reservationpage','WelcomeController@reservationpage');
Route::get('customerlogin', 'WelcomeController@customerlogin')->name('customerlogin'); 
Route::post('registercustomer','WelcomeController@registercustomer');
Route::post('logincustomer','WelcomeController@logincustomer');
Route::post('customerpage','WelcomeController@customerpage');
Route::get('logoutcustomer','WelcomeController@logoutcustomer');

Route::post('reservefornewcustomer','WelcomeController@reservefornewcustomer');
Route::post('reserveforocustomer','WelcomeController@reserveforocustomer'); 
Route::post('editmeascustomer','WelcomeController@editmeascustomer');
Route::post('thankyoupage','WelcomeController@thankyoupage');
 










