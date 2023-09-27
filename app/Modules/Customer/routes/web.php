<?php

use App\Modules\Customer\Http\Controllers\CustomerController;
use App\Modules\Customer\Http\Controllers\FilterController;
use Illuminate\Support\Facades\Route;

Route::get('addinfo', 'CustomerController@create')->name('customerinfo');

Route::group(['middleware'=>'check'], function(){

    Route::resource('customers', 'CustomerController');
    Route::get('/deleted','CustomerController@deleted')->name('deleted');
    Route::get('/restore/{id}', 'CustomerController@reStore')->name('reStore');
    Route::get('/force-delete/{id}', 'CustomerController@forceDelete')->name('forceDelete');
    Route::get('/person/{email}', 'CustomerController@person')->name('person');
    Route::get('/get_importxl_file', 'CustomerController@getXlimport')->name('getXlimport');
    Route::post('/customer/importxl', 'CustomerController@importxl')->name('importxl');
    Route::get('/email', 'CustomerController@sendEmail')->name('sendEmail');
    Route::get('/message-box', 'CustomerController@messageBox')->name('messageBox');
    Route::get('/ind_msg', 'CustomerController@indMsgBox')->name('indMsgBox');
    Route::get('/mail_report', 'CustomerController@emailReport')->name('emailReport');
    Route::get('/filter', 'CustomerController@filterCustomer')->name('filterCustomer');

    Route::post('/download_customer', [FilterController::class,'downloadExportxl'])->name('downloadExportxl');
});
