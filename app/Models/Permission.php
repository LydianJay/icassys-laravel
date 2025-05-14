<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table = 'permission';
    protected $primaryKey = 'permission_id';
    public $timestamps = false;
    protected $fillable = [
        'permission_id',
        'subm_id',
        'user_id',
        'allowed'
    ]; 
}
