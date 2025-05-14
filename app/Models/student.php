<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public $table = 'student';
    protected $primaryKey = 'student_id';
    public $timestamps = false;
    protected $fillable = [
        'student_id',
        'user_id',
        'admission_no',
        'guardian_id',
        'category',
        'lvl',
        'sem',
    ];
}
