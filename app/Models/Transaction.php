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
        'discount',
        'total',
    ];

    public function items(){
        return $this->belongsTo(Items::class, 'id_item');
    }
}
