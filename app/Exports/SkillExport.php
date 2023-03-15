<?php

namespace App\Exports;

use App\Models\Skill;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SkillExport implements FromView
{
    public function view(): View
    {
        $skills = Skill::all();
        return view('skill.table', ['skills' => $skills]);
    }
}
