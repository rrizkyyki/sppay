<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $table = 'spp';
    protected $primarykey = 'id';
    protected $guarded = ['id'];

    // to get custom date formats
    // protected $dates = [
    //     'start_period',
    //     'end_period'
    // ];
}
