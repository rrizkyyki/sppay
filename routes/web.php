<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentHomeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OperatorController;

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
Route::post('/send-guest-mail', [LandingPageController::class, 'sendGuestMail'])->name('send-guest-mail');

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout')->middleware('auth');
});

// Home
Route::get('/home', [HomeController::class, 'index'])->name('index')->middleware(['auth:web']);

// Grade
Route::controller(GradeController::class)->prefix('grade')->name('grade.')->middleware(['isAdmin'])->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export-excel', 'exportExcel')->name('export-excel');
});

// Skill
Route::controller(SkillController::class)->prefix('skill')->name('skill.')->middleware(['isAdmin'])->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export-excel', 'exportExcel')->name('export-excel');
});

// Spp
Route::controller(SppController::class)->prefix('spp')->name('spp.')->middleware(['isAdmin'])->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export-excel', 'exportExcel')->name('export-excel');
});

// Student
Route::controller(StudentController::class)->prefix('student')->name('student.')->middleware(['auth'])->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
    Route::get('export-excel', 'exportExcel')->name('export-excel');
});