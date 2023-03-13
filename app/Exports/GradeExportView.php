<?php

namespace App\Exports;

use App\Models\Grade;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GradeExportView implements FromView
{
    public function view(): View
    {
        $grades = Grade::all();
        return view('grade.table', ['grades' => $grades]);
    }
}
