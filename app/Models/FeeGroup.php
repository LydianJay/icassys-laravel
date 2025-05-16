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

    public function classMaster()
    {
        // FeeGroup belongs to one ClassMaster
        return $this->belongsTo(ClassMaster::class, 'class_master_id', 'class_master_id');
    }

    public function feeType()
    {
        return $this->belongsTo(FeeType::class, 'fee_type_id', 'fee_type_id');
    }
}
