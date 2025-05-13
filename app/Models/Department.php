<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    public $table = 'department';
    protected $primaryKey = 'dept_id';
    public $timestamps = false;
    protected $fillable = [
        'dept_id',
        'dept_name',
    ];
}
