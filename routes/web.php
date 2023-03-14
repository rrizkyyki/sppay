<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\OfflinePaymentController;
use App\Http\Controllers\OnlinePaymentController;

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

// Landing Page
Route::get('/', [LandingPageController::class, 'index']);

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout')->middleware('auth:web,student');
});

// Home
Route::controller(HomeController::class)->middleware(['auth:web,student'])->group(function () {
    Route::get('/home', 'index')->name('home.index');
    Route::get('/dashboard', 'dashboard')->name('student.dashboard');
});

// Grade
Route::controller(GradeController::class)->prefix('grade')->name('grade.')->middleware(isAdmin::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export_excel', 'export_excel')->name('export_excel');
    Route::get('export_excel_view', 'exportExcelView')->name('export_excel_view');
});

// Major
Route::controller(MajorController::class)->prefix('major')->name('major.')->middleware('isAdmin')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export_excel', 'export_excel')->name('export_excel');
    Route::get('export_excel_view', 'exportExcelView')->name('export_excel_view');
});

// Spp
Route::controller(SppController::class)->prefix('spp')->name('spp.')->middleware('isAdmin')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export_excel', 'export_excel')->name('export_excel');
    Route::get('export_excel_view', 'exportExcelView')->name('export_excel_view');
});

// Student
Route::controller(StudentController::class)->prefix('student')->name('student.')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export_excel', 'export_excel')->name('export_excel');
    Route::get('export_excel_view', 'exportExcelView')->name('export_excel_view');
});

// OfflinePayment
Route::controller(OfflinePaymentController::class)->prefix('offlinePayment')->name('offlinePayment.')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::get('transaction/{id}', 'transaction')->name('transaction');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export_excel', 'export_excel')->name('export_excel');
    Route::get('export_student_status_view', 'exportStudentStatusExcelView')->name('export_student_status_view');
    Route::get('export_excel_view', 'exportExcelView')->name('export_excel_view');
    Route::get('invoice/{id}', 'offlinePaymentInvoice')->name('invoice');
});

// Operator (users)
Route::controller(OperatorController::class)->prefix('operator')->name('operator.')->middleware('isAdmin')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export_excel', 'export_excel')->name('export_excel');
    Route::get('export_excel_view', 'exportExcelView')->name('export_excel_view');
});

// Online Payments
Route::controller(OnlinePaymentController::class)->prefix('online-payment')->name('online-payment.')->middleware(['auth:web,student'])->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export_excel_view', 'exportExcelView')->name('export_excel_view');
});