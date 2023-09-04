<?php

use App\Modules\Customer\Http\Controllers\FilterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::apiResources([

//     'filter'=>FilterController::class,

// ]);

Route::post('/filter_customer', [FilterController::class,'filterCustomer'])->name('filterCustomer');
//Route::get('/download_customer', [FilterController::class,'downloadExportxl'])->name('downloadExportxl');