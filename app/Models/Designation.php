<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public $table = 'designation';
    protected $primaryKey = 'd_id';
    public $timestamps = false;
    protected $fillable = [
        'd_id',
        'role_id',
        'staff_id',
    ];
}
