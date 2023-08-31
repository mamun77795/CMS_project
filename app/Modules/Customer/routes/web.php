<?php

use App\Modules\Customer\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('addinfo', 'CustomerController@create')->name('customerinfo');

Route::group(['middleware'=>'check'], function(){
    Route::resource('customers', 'CustomerController');
    Route::get('/deleted','CustomerController@deleted')->name('deleted');
    Route::get('/restore/{id}', 'CustomerController@reStore')->name('reStore');
    Route::get('/force-delete/{id}', 'CustomerController@forceDelete')->name('forceDelete');
    Route::get('/person/{email}', 'CustomerController@person')->name('person');
    Route::get('/customer/exportxl', 'CustomerController@exportxl')->name('exportxl');
    Route::get('/get_importxl_file', 'CustomerController@getXlimport')->name('getXlimport');
    Route::post('/customer/importxl', 'CustomerController@importxl')->name('importxl');
    Route::get('/generatepdf','CustomerController@generatePdf')->name('generatePdf');
    Route::get('/email', 'CustomerController@sendEmail')->name('sendEmail');
    Route::post('/send-sms', 'CustomerController@SmsProcess')->name('smsProcess');
    Route::get('/message-box', 'CustomerController@messageBox')->name('messageBox');
    Route::get('/ind_msg', 'CustomerController@indMsgBox')->name('indMsgBox');
});