<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\admin\LoadsController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\admin\FacultyController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\SubjectController;
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
    return view('auth.login');
})->name('home');


//Register
Route::middleware(['guest'])->group(function () {

//register admin
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

});

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //excel table preview
    Route::post('/previewTable', [DashboardController::class, 'previewTable'])->name('previewTable');
    Route::post('/reg', [RegisterStudentController::class, 'registerStudent'])->name('registerStudent');

    //student list
    Route::get('/admin/studentlist', [StudentController::class, 'index'])->name('admin.studentlist');

    //create section
    Route::get('/admin/section', [SectionController::class, 'index'])->name('admin.section');
    Route::post('/admin/create-section', [SectionController::class, 'store'])->name('admin.createsection');

    //create subject
    Route::get('/admin/subject', [SubjectController::class, 'index'])->name('admin.subject');
    Route::post('/admin/create-subject', [SubjectController::class, 'store'])->name('admin.createsubject');

    //faculty
    Route::get('/admin/faculty', [FacultyController::class, 'index'])->name('admin.faculty');
    Route::post('/admin/create-faculty', [FacultyController::class, 'store'])->name('admin.createfaculty');
    //laods
    Route::get('/admin/faculty/loads/{id}', [LoadsController::class, 'index'])->name('admin.faculty.loads');
    Route::post('/admin/faculty/loads/assign', [LoadsController::class, 'store'])->name('admin.faculty.assignloads');
   
});
