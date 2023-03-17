<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $payments = Payment::where('amount', 'LIKE', '%' .$request->search. '%')
                                ->orWhere('pay_date', 'LIKE', '%' .$request->search. '%')
                                ->simplePaginate(5);
        } else {
            $payments = Payment::simplePaginate(5);
        }

        return view('payment.index', ['title' => 'Pembayaran'], compact(['payments']));
    }
}
