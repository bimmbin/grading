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
use App\Http\Controllers\admin\AdminGradeController;
use App\Http\Controllers\admin\AdminRequestController;
use App\Http\Controllers\faculty\GradeViewController;
use App\Http\Controllers\faculty\GradePostedController;
use App\Http\Controllers\faculty\FacultyGradeController;
use App\Http\Controllers\faculty\FacultyLoadsController;
use App\Http\Controllers\student\StudentGradeController;
use App\Http\Controllers\admin\RegisterStudentController;
use App\Http\Controllers\faculty\EditGradeController;
use App\Http\Controllers\faculty\GradeUnpostedController;
use App\Http\Controllers\faculty\RemarksController;

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
   
    //grades
    Route::get('/admin/grade', [AdminGradeController::class, 'grade'])->name('admin.grade');
    Route::get('/admin/grade/submitted', [AdminGradeController::class, 'submittedGrades'])->name('admin.submittedgrade');
    Route::get('/admin/grade/changerequest', [AdminGradeController::class, 'requestchange'])->name('admin.request');
    Route::get('/admin/grade/changerequest-lists/{id}', [AdminGradeController::class, 'requestList'])->name('admin.request.list');
   
    //change request approve
    Route::post('/admin/grade/changerequest/approve', [AdminRequestController::class, 'store'])->name('admin.request.approve');
    //change request deny
    Route::post('/admin/grade/changerequest/deny', [AdminRequestController::class, 'deny'])->name('admin.request.deny');
   
});


Route::middleware(['auth', 'faculty'])->group(function () {

    //faculty Loads
    Route::get('/faculty/loads/{id}', [FacultyLoadsController::class, 'index'])->name('faculty.loads');

    //generate grade
    Route::post('/admin/generate-grade', [FacultyGradeController::class, 'store'])->name('faculty.generategrade');
    
    //Change of request grades
    Route::post('/admin/request-change-grade', [RemarksController::class, 'store'])->name('faculty.requestchange');
    
    //Edit student grades
    Route::post('/admin/edit-grade', [EditGradeController::class, 'store'])->name('faculty.editgrade');
    
});

Route::middleware(['auth', 'adminfaculty'])->group(function () {

    //overall loads grade
    Route::get('/faculty/loads/grade/{id}', [GradeViewController::class, 'index'])->name('faculty.loads-grades');
    
    //each loads grade
    Route::get('/faculty/loads/grades/{id}', [GradeUnpostedController::class, 'index'])->name('faculty.grades-view');
    
    //grade posted
    Route::post('/faculty/loads/posted/{id}', [GradePostedController::class, 'store'])->name('faculty.grade-posted');

});


Route::middleware(['auth', 'student'])->group(function () {

    //grade
    Route::get('/student/grades', [StudentGradeController::class, 'index'])->name('student.grade');
    

});
