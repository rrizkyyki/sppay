<?php

namespace App\Exports;

use App\Models\Offline_payment;
use Maatwebsite\Excel\Concerns\FromCollection;

class OfflinePaymentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Offline_payment::all();
    }
}
