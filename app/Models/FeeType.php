<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    public $table = 'fee_type';
    protected $primaryKey = 'fee_type_id';
    public $timestamps = false;
    protected $fillable = [
        'fee_type_id',
        'fee_type_name',
        'fees_code',
        'ammount',
    ];
}
