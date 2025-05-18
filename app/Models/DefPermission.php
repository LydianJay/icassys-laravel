<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefPermission extends Model
{
    public $table = 'def_permission';
    protected $primaryKey = 'def_perm_id';
    public $timestamps = false;
    protected $fillable = [
        'def_perm_id',
        'subm_id',
        'role_id',
        'allowed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function subModule()
    {
        return $this->belongsTo(SubModules::class, 'subm_id', 'subm_id');
    }
}
