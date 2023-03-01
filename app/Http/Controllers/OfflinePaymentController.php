<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offline_payment;
use App\Models\Student;
use App\Models\User;

class OfflinePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offlinePayments = Offline_payment::simplePaginate(5);
        return view('payment.offline.index', ['title' => 'Pembayaran Offline'], compact(['offlinePayments']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::simplePaginate(5);
        return view('payment.offline.create', ['title' => 'Tambah Pembayaran'], compact(['students']));
    }

    public function transaction($id)
    {
        $user = User::all();
        $student = Student::find($id);
        return view('payment.offline.transaction', ['title' => 'Transaksi'], compact(['user', 'student']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offlinePayments = $request->except('_token', '_method');
        Offline_payment::create($offlinePayments);
        return redirect('/offlinePayment/create')->with('success', 'Pembayaran berhasil!, Silahkan Konfirmasi Transaksi.');
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
     * @param  int  $studentId
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // search id
        $student = Student::find($id);
        // return view
        return view('payment.offline.edit', ['title' => 'Transaksi'], compact(['student']));
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

        // update
        $student->update($request->except('_token', '_method'));

        // return with alert
        return redirect('/offlinePayment/create')->with('success', 'Status Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
