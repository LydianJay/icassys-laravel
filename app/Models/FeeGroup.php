<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeGroup extends Model
{
    public $table = 'fee_group';
    protected $primaryKey = 'fee_group_id';
    public $timestamps = false;
    protected $fillable = [
        'fee_group_id',
        'class_master_id',
        'fee_type_id',
    ];
}
