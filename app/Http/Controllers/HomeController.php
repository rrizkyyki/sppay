<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use App\Models\Skill;
use App\Models\Spp;
use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        $grades = Grade::all();
        $skills = Skill::all();
        $spp = Spp::all();
        $students = Student::all();
        return view('home.index', ['title' => 'Dashboard'], compact([
            'users',
            'grades',
            'skills',
            'spp',
            'students',
        ]));
    }
}
