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
use App\Http\Controllers\faculty\GradeViewController;
use App\Http\Controllers\faculty\GradePostedController;
use App\Http\Controllers\faculty\FacultyGradeController;
use App\Http\Controllers\faculty\FacultyLoadsController;
use App\Http\Controllers\student\StudentGradeController;
use App\Http\Controllers\admin\RegisterStudentController;
use App\Http\Controllers\faculty\GradeUnpostedController;

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



//Register
Route::middleware(['guest'])->group(function () {

Route::get('/', [LoginController::class, 'index'])->name('home');

//register admin
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

});

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Admin
Route::middleware(['auth', 'admin'])->group(function () {
   
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

Route::middleware(['auth', 'faculty'])->group(function () {

    //create section
    Route::get('/faculty/loads', [FacultyLoadsController::class, 'index'])->name('faculty.loads');
    
    //generate grade
    Route::post('/admin/generate-grade', [FacultyGradeController::class, 'store'])->name('faculty.generategrade');
    
    //overall loads grade
    Route::get('/faculty/loads/grade', [GradeViewController::class, 'index'])->name('faculty.loads-grades');
    
    //each loads grade
    Route::get('/faculty/loads/grades/{id}', [GradeUnpostedController::class, 'index'])->name('faculty.grades-view');
    
    //grade posted
    Route::post('/faculty/loads/posted/{id}', [GradePostedController::class, 'store'])->name('faculty.grade-posted');

});


Route::middleware(['auth', 'student'])->group(function () {

    //grade
    Route::get('/student/grades', [StudentGradeController::class, 'index'])->name('student.grade');
    

});