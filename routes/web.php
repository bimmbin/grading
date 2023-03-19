<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RegisterStudentController;

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

Route::get('/', function () {
    return view('admin.dashboard');
});


//Register
Route::get('/register', [RegisterController::class, 'index'])
    ->name('register')
    ->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/sample', [DashboardController::class, 'sample'])->name('sample');

Route::post('/previewTable', [DashboardController::class, 'previewTable'])->name('previewTable');


Route::post('/reg', [RegisterStudentController::class, 'registerStudent'])->name('registerStudent');

