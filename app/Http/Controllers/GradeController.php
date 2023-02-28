<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Major;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::simplePaginate(5);
        return view('grade.index', ['title' => 'Kelas'], compact(['grades']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::all();
        return view('grade.create', ['title' => 'Kelas'], compact(['majors']));
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
        $validatedData = $request->validate([
            'grade' => 'required',
            'major_id' => 'required'
        ]);

        // store data
        Grade::create($validatedData);

        // back with success alert
        return redirect('/grade')->with('success', 'Kelas Berhasil Ditambahkan!');
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
        $grade = Grade::find($id);

        // get major
        $majors = Major::all();

        // return view with data
        return view('grade.edit', ['title' => 'Edit Kelas'], compact(['grade', 'majors']));
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
        $grade = Grade::find($id);

        // add rules
        $validatedData = $request->validate([
            'grade' => 'required',
            'major_id' => 'required'
        ]);

        // update data after validating
        $grade->update($validatedData);

        // return with alert
        return redirect('/grade')->with('success', 'Kelas Berhasil Diubah!');
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
        $grade = Grade::find($id);

        // run the delete function
        $grade->delete();

        // back with success alert
        return redirect('/grade')->with('success', 'Kelas Berhasil Dihapus!');
    }
}
