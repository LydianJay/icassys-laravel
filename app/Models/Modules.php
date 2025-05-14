<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    public $table = 'modules';
    protected $primaryKey = 'module_id';
    public $timestamps = false;
    protected $fillable = [
        'module_id',
        'module_name',
    ];
}
