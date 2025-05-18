<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = 'role';
    protected $primaryKey = 'role_id';
    public $timestamps = false;
    protected $fillable = [
        'role_id',
        'role_name',
    ];

    public function defaultPermissions()
    {
        return $this->hasMany(DefPermission::class, 'role_id', 'role_id');
    }

    
        
}
