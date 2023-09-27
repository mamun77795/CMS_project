<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Modules\Customer\Http\Controllers\FilterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function () {
    $session_id = session('sess_id');
    if (!isset($session_id)) {
        return view('login');
    } else {
        return view('dashboard');
    }
})->name('login');

Route::post("/auth", [AuthController::class, 'auth'])->name('auth');

Route::middleware(['check'])->group(function () {

    Route::get('/home', [DashboardController::class, 'index']);

    Route::middleware(['checksession'])->group(function(){
        Route::resource('users', UserController::class);
    });
    
    Route::get("/logout", [AuthController::class, 'logout'])->name('logout');
});

Route::post('/filter_customer', [FilterController::class, 'filterCustomer'])->name('filterCustomer');

Route::post('/filtering', [FilterController::class, 'getDivision'])->name('getDivision');
Route::post('/filter-districts', [FilterController::class, 'getDistricts'])->name('getDistricts');
Route::post('/filter-thanas', [FilterController::class, 'getThanas'])->name('getThanas');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('forgot-password.post');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset-password.post');
