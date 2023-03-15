<?php

namespace App\Exports;

use App\Models\Spp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SppExport implements FromView
{
    public function view(): View
    {
        $spp = Spp::all();
        return view('spp.table', ['spp' => $spp]);
    }
}
