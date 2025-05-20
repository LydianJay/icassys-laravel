<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentFees extends Model
{
    public $table = 'student_fees';
    protected $primaryKey = 'student_fee_id';
    public $timestamps = false;
    protected $fillable = [
        'student_fee_id',
        'student_id',
        'fee_type_id',
        'academic_year_id',
        'amount',
    ];
}
