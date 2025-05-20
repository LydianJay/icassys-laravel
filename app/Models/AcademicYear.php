<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    public $table = 'academic_year';
    protected $primaryKey = 'academic_year_id';
    public $timestamps = false;
    protected $fillable = [
        'academic_year_id',
        'period',
        'start_date',
        'end_date',
        'is_active',
    ];
    
}
