<?php

namespace App\Models;

use App\Models\Stok;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function stok(){
        return $this->hasOne(Stok::class);
    }

    public function delivery(){
        return $this->hasMany(Delivery::class);
    }
}
