<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'grades';
    protected $primarykey = 'id';
    protected $guarded = ['id'];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
