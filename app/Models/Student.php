<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primarykey = 'id';
    protected $guarded = ['id'];

    // auth
    protected $guard = 'student';
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function grade()
    {
        return $this->hasOne(Grade::class, 'grade_id');
    }

    public function skill()
    {
        return $this->hasOne(Skill::class, 'skill_id');
    }

    public function spp()
    {
        return $this->hasOne(Spp::class, 'spp_id');
    }
}
