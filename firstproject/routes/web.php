<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IndexController;
// use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/accounts', AccountController::class)->middleware('auth');
// Route::resource('/employees', EmployeeController::class)->middleware('auth');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/employees', EmployeeController::class);

Route::resource('/index', IndexController::class);
// Route
// ::get('add-account',[AccountController::class,'add_account']);
