<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offline_payment;
use App\Models\Student;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentPaymentStatusExportView;
use App\Exports\OfflinePaymentExportView;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class OfflinePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $offlinePayments = Offline_payment::where('amount', 'LIKE', '%' .$request->search. '%')
                                                    ->orWhere('pay_date', 'LIKE', '%' .$request->search. '%')
                                                    ->simplePaginate(10);
        } else {
            $offlinePayments = Offline_payment::simplePaginate(10);
        }

        return view('payment.offline.index', ['title' => 'Pembayaran Offline'], compact(['offlinePayments']));
    }

    // export excel using view
    public function exportStudentStatusExcelView()
    {
        return Excel::download(new StudentPaymentStatusExportView, 'status-pembayaran-murid.xlsx');
    }

    // export excel using view
    public function exportExcelView()
    {
        return Excel::download(new OfflinePaymentExportView, 'pembayaran-offline.xlsx');
    }

    // export pdf
    public function offlinePaymentInvoice($id)
    {
        $offlinePayment = Offline_payment::find($id);
        $student = Student::find($id);
        $invoice_date = date('j_F_Y'); 
        $pdf = Pdf::loadView('payment.offline.invoice', ['offlinePayment' => $offlinePayment, 'student' => $student]);
        return $pdf->stream('invoice_'.config('app.name').'_'.$invoice_date.'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has('search')) {
            $students = Student::where('name', 'LIKE', '%' .$request->search. '%')
                                    ->orWhere('nisn', 'LIKE', '%' .$request->search. '%')
                                    ->orWhere('nis', 'LIKE', '%' .$request->search. '%')
                                    ->orWhere('address', 'LIKE', '%' .$request->search. '%')
                                    ->orWhere('phone_number', 'LIKE', '%' .$request->search. '%')
                                    ->simplePaginate(10);
        } else {
            $students = Student::simplePaginate(10);
        }

        return view('payment.offline.create', ['title' => 'Tambah Pembayaran'], compact(['students']));
    }

    public function transaction($id)
    {
        $user = Auth::user();
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
        return redirect('/offlinePayment/create')->with('success', 'Pembayaran berhasil! Silahkan Konfirmasi Transaksi.');
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
