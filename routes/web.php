<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\AuthenticMiddleware;
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
    return view('welcome');
});
Route::get('dashboard/index',[DashboardController::class,'index'])
->name('dashboard.index')->middleware(AuthenticMiddleware::class);
Route::get('admin', [AuthController::class,'index'])->name('auth.admin');
Route::post('login', [AuthController::class,'login'])->name('auth.login')->middleware('login');;
Route::get('logout', [AuthController::class,'logout'])->name('auth.logout');