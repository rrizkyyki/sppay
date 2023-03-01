<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::simplePaginate(5);
        return view('spp.index', ['title' => 'Spp'], compact(['spp']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.create', ['title' => 'Tambah Spp']);
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
            'start_period' => 'required',
            'end_period' => 'required',
            'amount' => 'required',
        ]);

        // store data
        Spp::create($validatedData);

        // return with alert
        return redirect('/spp')->with('success', 'Spp Berhasil Ditambahkan!');
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
        $spp = Spp::find($id);

        // return view with data
        return view('spp.edit', ['title' => 'Edit Spp'], compact(['spp']));
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
        $spp = Spp::find($id);

        // add rules
        $validatedData = $request->validate([
            'start_period' => 'required',
            'end_period' => 'required',
            'amount' => 'required',
        ]);

        // update data after validating
        $spp->update($validatedData);

        // return with alert
        return redirect('/spp')->with('success', 'Spp Berhasil Diubah!');
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
        $spp = Spp::find($id);

        // run the delete function
        $spp->delete();

        // back with success alert
        return redirect('/spp')->with('success', 'Spp Berhasil Dihapus!');
    }
}
