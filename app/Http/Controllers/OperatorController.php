<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Exports\UserExport;
use App\Exports\UserExportView;
use Maatwebsite\Excel\Facades\Excel;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::simplepaginate(10);
        return view('operator.index', ['title' => 'Petugas'], compact(['users']));
    }

    public function export_excel()
    {
        return Excel::download(new UserExport, 'petugas.xlsx');
    }

    public function exportExcelView()
    {
        return Excel::download(new UserExportView, 'petugas.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.create', ['title' => 'Tambah Petugas']);
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
            'role' => 'required|in:admin,operator',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|min:8'
        ]);

        $request['password'] = bcrypt($request['password']);

        if ($request->file('image')) {
            $image = $request->file('image')->store('operator-profiles');
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'image' => $image,
                'password' => $request->password
            ]);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'image' => $request->image,
                'password' => $request->password
            ]);
        }

        // back with success
        return redirect('/operator')->with('success', 'Petugas berhasil ditambahkan!');
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
        $user = User::find($id);
        return view('operator.edit', ['title' => 'Edit Petugas'], compact(['user']));
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
        $operator = User::find($id);

        // add rules
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:students,email',
            'role' => 'required|in:admin,operator',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|min:8'
        ];

        // validate request
        $validatedData = $request->validate($rules);

        // if theres an image add the new image
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('operator-profiles');
        }

        // update data after validating
        $operator->update($validatedData);

        // return with alert
        return redirect('/operator')->with('success', 'Petugas Berhasil Diubah!');
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
        $operator = User::find($id);

        if ($operator->image) {
            Storage::delete($operator->image);
        }

        // run the delete function
        $operator->delete();

        // back with success alert
        return redirect('/operator')->with('success', 'Petugas Berhasil Dihapus!');
    }
}
