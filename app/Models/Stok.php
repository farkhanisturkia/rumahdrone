<?php

namespace App\Models;

use App\Models\Inventaris;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventaris_id',
        'total',
        'in',
        'out',
        'min'
    ];

    public function inventaris(){
        return $this->belongsTo(Inventaris::class, 'inventaris_id');
    }

}
