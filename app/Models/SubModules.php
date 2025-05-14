<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubModules extends Model
{
    public $table = 'sub_modules';
    protected $primaryKey = 'subm_id';
    public $timestamps = false;
    protected $fillable = [
        'subm_id',
        'module_id',
        'subm_name',
        'route'
    ];
}
