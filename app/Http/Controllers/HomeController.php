<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\User;
use App\Models\Grade;
use App\Models\Spp;
use App\Models\Student;
use App\Models\Offline_payment;
use App\Models\Online_payment;

class HomeController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        $users = User::all();
        $grades = Grade::all();
        $spp = Spp::all();
        $students = Student::all();
        $offlinePayments = Offline_payment::all();
        $onlinePayments = Online_payment::all();
        return view('home.index', ['title' => 'Dashboard'], compact([
            'majors',
            'grades',
            'spp',
            'students',
            'offlinePayments',
            'onlinePayments',
            'users'
        ]));
    }

    public function dashboard()
    {
        return view('home.dashboard', ['title' => 'Dashboard']);
    }
}
