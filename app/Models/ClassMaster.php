<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassMaster extends Model
{
    public $table = 'class_master';
    protected $primaryKey = 'class_master_id';
    public $timestamps = false;
    protected $fillable = [
        'class_master_id',
        'class_code',
        'class_name',
        'category',
    ];
}
