<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SppExport;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countSpp = Spp::count();

        if ($request->has('search')) {
            $spp = Spp::where('year', 'LIKE', '%' .$request->search. '%')
                            ->orWhere('amount', 'LIKE', '%' .$request->search. '%')
                            ->orderBy('id', 'DESC')
                            ->simplePaginate(5);
        } else {
            $spp = Spp::orderBy('id', 'DESC')->simplePaginate(5);
        }

        return view('spp.index', ['title' => 'Spp'], compact(['spp', 'countSpp']));
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
            'year' => 'required|unique:spp,year',
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
            'year' => 'required',
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

    /**
     * export excel
     * export pdf
     */
    public function exportExcel()
    {
        return Excel::download(new SppExport, 'Spp.xlsx');
    }
}
