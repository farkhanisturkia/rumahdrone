<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'date',
        'inventaris_id',
        'order_total',
        'address',
        'status'
    ];

    public function inventaris(){
        return $this->belongsTo(Inventaris::class, 'inventaris_id');
    }
}
