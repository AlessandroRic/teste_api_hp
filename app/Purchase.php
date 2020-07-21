<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'quantity', 'total_price', 'products_id',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
