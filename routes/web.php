<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;

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

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout')->middleware('auth:web,student');
});

// Home
Route::controller(HomeController::class)->middleware(['auth:web,student'])->group(function () {
    Route::get('/home', 'index')->name('home.index');
});

// Major
Route::controller(MajorController::class)->prefix('major')->name('major.')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
});

// Grade
Route::controller(GradeController::class)->prefix('grade')->name('grade.')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
});

// Spp
Route::controller(SppController::class)->prefix('spp')->name('spp.')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
});

// Student
Route::controller(StudentController::class)->prefix('student')->name('student.')->middleware('auth')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('edit/{id}', 'update')->name('update');
    Route::delete('destroy/{id}', 'destroy')->name('destroy');
});