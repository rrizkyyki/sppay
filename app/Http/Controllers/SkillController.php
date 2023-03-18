<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Exports\SkillExport;
use Maatwebsite\Excel\Facades\Excel;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countSkills = Skill::count();
        
        // search
        if ($request->has('search')) {
            $skills = Skill::where('skill', 'LIKE', '%' .$request->search. '%')->simplePaginate(5);
        } else {
            $skills = Skill::simplePaginate(5);
        }

        return view('skill.index', ['title' => 'Jurusan'], compact(['skills', 'countSkills']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skill.create', ['title' => 'Tambah Jurusan']);
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
            'skill' => 'required|min:2|unique:skills,skill'
        ]);

        // store data
        Skill::create($validatedData);

        // back with success alert
        return redirect('/skill')->with('success', 'Jurusan Berhasil Ditambahkan!');
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
        $skill = Skill::find($id);

        // return view with data
        return view('skill.edit', ['title' => 'Edit Jurusan'], compact(['skill']));
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
        $skill = Skill::find($id);

        // add rules
        $validatedData = $request->validate([
            'skill' => 'required|min:2|unique:skills,skill'
        ]);

        // update data after validating
        $skill->update($validatedData);

        // return with alert
        return redirect('/skill')->with('success', 'Jurusan Berhasil Diubah!');
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
        $skill = Skill::find($id);

        // run the delete function
        $skill->delete();

        // back with success alert
        return redirect('/skill')->with('success', 'Jurusan Berhasil Dihapus!');
    }

    /**
     * export excel
     * export pdf
     */
    public function exportExcel()
    {
        return Excel::download(new SkillExport, 'Jurusan.xlsx');
    }
}
