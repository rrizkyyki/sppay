<?php

namespace App\Exports;

use App\Models\Major;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MajorExportView implements FromView
{
    public function view(): View
    {
        $majors = Major::all();
        return view('major.table', ['majors' => $majors]);
    }
}
