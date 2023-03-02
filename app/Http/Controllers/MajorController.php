<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Exports\MajorExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::simplePaginate(5);
        return view('major.index', ['title' => 'Jurusan'], compact(['majors']));
    }

    public function export_excel()
    {
        return Excel::download(new MajorExport, 'jurusan.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('major.create', ['title' => 'Tambah Jurusan']);
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
            'major' => 'required|min:2|unique:majors,major'
        ]);

        // store data
        Major::create($validatedData);

        // back with success alert
        return redirect('/major')->with('success', 'Jurusan Berhasil Ditambahkan!');
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
        $major = Major::find($id);

        // return view with data
        return view('major.edit', ['title' => 'Edit Jurusan'], compact(['major']));
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
        $major = Major::find($id);

        // add rules
        $validatedData = $request->validate([
            'major' => 'required|min:2|unique:majors,major'
        ]);

        // update data after validating
        $major->update($validatedData);

        // return with alert
        return redirect('/major')->with('success', 'Jurusan Berhasil Diubah!');
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
        $major = Major::find($id);

        // run the delete function
        $major->delete();

        // back with success alert
        return redirect('/major')->with('success', 'Jurusan Berhasil Dihapus!');
    }
}
