<?php

use App\Modules\Customer\Http\Controllers\FilterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::apiResources([

//     'filter'=>FilterController::class,

// ]);

//Route::post('/filter_customer', [FilterController::class,'filterCustomer'])->name('filterCustomer');
Route::post('/filter_division', [FilterController::class,'filterDivision'])->name('filterDivision');
