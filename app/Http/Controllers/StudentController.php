<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Skill;
use App\Models\Spp;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentExport;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countStudents = Student::count();

        // search
        if ($request->has('search')) {
            $students = Student::where('name', 'LIKE', '%' .$request->search. '%')
                                    ->orWhere('nisn', 'LIKE', '%' .$request->search. '%')
                                    ->orWhere('nis', 'LIKE', '%' .$request->search. '%')
                                    ->orWhere('address', 'LIKE', '%' .$request->search. '%')
                                    ->orWhere('phone_number', 'LIKE', '%' .$request->search. '%')
                                    ->orWhere('gender', 'LIKE', '%' .$request->search. '%')
                                    ->orderBy('id', 'DESC')
                                    ->simplePaginate(5);
        } else {
            $students = Student::simplePaginate(5);
        }

        return view('student.index', ['title' => 'Siswa'], compact(['students', 'countStudents']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        $skills = Skill::all();
        $spp = Spp::all();
        return view('student.create', ['title' => 'Tambah Siswa'], compact(['grades', 'spp', 'skills']));
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
            'nisn' => 'required|unique:students,nisn',
            'nis' => 'required|unique:students,nis',
            'name' => 'required',
            'email' => 'required|unique:students,email',
            'gender' => 'required',
            'grade_id' => 'required',
            'skill_id' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'spp_id' => 'required',
            'payment_status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|min:8'
        ]);

        // encrypt password
        $request['password'] = bcrypt($request['password']);

        if ($request->file('image')) {
            $image = $request->file('image')->store('student-profiles');
            Student::create([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'grade_id' => $request->grade_id,
                'skill_id' => $request->skill_id,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'spp_id' => $request->spp_id,
                'payment_status' => $request->payment_status,
                'image' => $image,
                'password' => $request->password,
            ]);
        } else {
            Student::create([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'grade_id' => $request->grade_id,
                'skill_id' => $request->skill_id,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'spp_id' => $request->spp_id,
                'payment_status' => $request->payment_status,
                'image' => $request->image,
                'password' => $request->password,
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
        $skill = Skill::all();
        $spp = Spp::all();
        return view('student.edit', ['title' => 'Edit Siswa'], compact(['grades', 'spp', 'student', 'skill']));
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
            'nisn' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'grade_id' => 'required',
            'skill_id' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'spp_id' => 'required',
            'payment_status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|min:8'
        ];

        // validate
        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('student-profiles');
        }

        // update data after validating
        $student->update($validatedData);

        // return with success message
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

    /**
     * export excel
     * export pdf
     */
    public function exportExcel()
    {
        return Excel::download(new StudentExport, 'Murid.xlsx');
    }
}
