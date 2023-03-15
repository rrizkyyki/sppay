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