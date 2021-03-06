<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'price', 'quantity_stock'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
