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
    
}
