<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    public $table = 'guardian';
    protected $primaryKey = 'guardian_id';
    public $timestamps = false;
    protected $fillable = [
        'guardian_id',
        'relation',
        'name',
        'g_contactno',
        'address',
        'occupation',
    ];
}
