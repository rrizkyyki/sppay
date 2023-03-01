<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Major;
use App\Models\Spp;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::simplePaginate(5);
        return view('student.index', ['title' => 'Siswa'], compact(['students']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        $majors = Major::all();
        $spp = Spp::all();
        return view('student.create', ['title' => 'Tambah Siswa'], compact(['grades', 'spp', 'majors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // add rules
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:students,email',
            'nisn' => 'required|unique:students,nisn',
            'nis' => 'required|unique:students,nis',
            'grade_id' => 'required',
            'major_id' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'spp_id' => 'required',
            'payment_status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|min:8'
        ]);

        // method 1 errors
        // if ($request->file('image')) {
        //     $image = $request->file('image')->store('student-profile');
        //     $request->image = $image;
        // }
        // $request->password = bcrypt($request->password);
        // Student::create($request->all());

        // method 2
        $request['password'] = bcrypt($request['password']);

        if ($request->file('image')) {
            $image = $request->file('image')->store('student-profiles');
            Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'grade_id' => $request->grade_id,
                'major_id' => $request->major_id,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'spp_id' => $request->spp_id,
                'payment_status' => $request->payment_status,
                'image' => $image,
                'password' => $request->password
            ]);
        } else {
            Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'grade_id' => $request->grade_id,
                'major_id' => $request->major_id,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'spp_id' => $request->spp_id,
                'payment_status' => $request->payment_status,
                'image' => $request->images,
                'password' => $request->password
            ]);
        }

        // back with success
        return redirect('/student')->with('success', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // search id
        $student = Student::find($id);
        $grades = Grade::all();
        $majors = Major::all();
        $spp = Spp::all();
        return view('student.edit', ['title' => 'Edit Siswa'], compact(['grades', 'spp', 'student', 'majors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // search id
        $student = Student::find($id);

        // add rules
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'nisn' => 'required',
            'nis' => 'required',
            'grade_id' => 'required',
            'major_id' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'spp_id' => 'required',
            'payment_status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|min:8'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('student-profiles');
        }

        // update data after validating
        $student->update($validatedData);

        // return with alert
        return redirect('/student')->with('success', 'Siswa Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // search id
        $student = Student::find($id);

        if ($student->image) {
            Storage::delete($student->image);
        }

        // run the delete function
        $student->delete();

        // back with success alert
        return redirect('/student')->with('success', 'Siswa Berhasil Dihapus!');
    }
}
