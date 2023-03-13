<?php

namespace App\Exports;

use App\Models\Offline_payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OfflinePaymentExportView implements FromView
{
    public function view(): View
    {
        $offlinePayments = Offline_payment::all();
        return view('payment.offline.table', ['offlinePayments' => $offlinePayments]);
    }
}
