<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExportView implements FromView
{
    public function view(): View
    {
        $users = User::all();
        return view('operator.table', ['users' => $users]);
    }
}
