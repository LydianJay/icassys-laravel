<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $table = 'staff';
    protected $primaryKey = 'staff_id';
    public $timestamps = false;
    protected $fillable = [
        'staff_id',
        'user_id',
        'dept_id',
        'marital',
        'join_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }

    // public function designation()
    // {
    //     return $this->hasOne(Designation::class, 'staff_id');
    // }
}
