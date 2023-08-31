<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLoginMiddleware;
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

Route::get('/', function () {
    $session_id = session('sess_id');
    if (!isset($session_id)) {
        return view('login');
    }else{
        return view('dashboard');
    }
})->name('login');

Route::post("/auth", [AuthController::class, 'auth'])->name('auth');

Route::middleware(['check'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::get("/logout", [AuthController::class, 'logout'])->name('logout');
});
