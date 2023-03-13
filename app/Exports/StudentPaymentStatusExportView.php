<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentPaymentStatusExportView implements FromView
{
    public function view(): View
    {
        $studentPaymentStatus = Student::all();
        return view('payment.offline.student-table-status', ['studentPaymentStatus' => $studentPaymentStatus]);
    }
}
