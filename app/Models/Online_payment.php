<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_payment extends Model
{
    use HasFactory;
    protected $table = 'online_payments';
    protected $primarykey = 'id';
    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
