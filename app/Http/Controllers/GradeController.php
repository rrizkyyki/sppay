<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GradeExport;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // search
        if ($request->has('search')) {
            $grades = Grade::where('grade', 'LIKE', '%' .$request->search. '%')->simplePaginate(5);
        } else {
            $grades = Grade::simplePaginate(5);
        }

        return view('grade.index', ['title' => 'Kelas'], compact(['grades']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade.create', ['title' => 'Kelas']);
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
            'grade' => 'required|unique:grades,grade'
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

        // return view with data
        return view('grade.edit', ['title' => 'Edit Kelas'], compact(['grade']));
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
        ]);

        // update data after validating
        $grade->update($validatedData);

        // return with success alert
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

    /**
     * exports excel
     * exports pdf
     */
    public function exportExcel()
    {
        return Excel::download(new GradeExport, 'Kelas.xlsx');
    }
}
