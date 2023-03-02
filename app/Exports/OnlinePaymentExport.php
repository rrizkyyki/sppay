<?php

namespace App\Exports;

use App\Models\Online_payment;
use Maatwebsite\Excel\Concerns\FromCollection;

class OnlinePaymentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Online_payment::all();
    }
}
