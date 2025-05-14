<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefPermission extends Model
{
    public $table = 'def_permisson';
    protected $primaryKey = 'def_permission_id';
    public $timestamps = false;
    protected $fillable = [
        'def_permission_id',
        'subm_id',
        'role_id',
        'allowed',
    ];
}
