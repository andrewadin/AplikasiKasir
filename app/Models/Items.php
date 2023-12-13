<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'item_name',
        'stok',
        'buy_price',
        'sell_price',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }
}
