<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_item',
        'price',
        'qty',
        'total',
    ];

    public function items(){
        return $this->belongTo(Items::class);
    }
}
