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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id', 'guardian_id');
    }
    public function studentFees()
    {
        return $this->hasMany(StudentFees::class, 'student_id', 'student_id');
    }
    
}
