<?php

namespace App;

use App\Notifications\NewProductSold;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Purchase extends Model
{
    use Notifiable;

    protected static function boot()
    {
        parent::boot();

        self::created(function($model) {
            $model->notify(new NewProductSold());
        });
    }

    protected $fillable = [
        'quantity', 'total_price', 'products_id',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function routeNotificationFor($driver, $notification = null)
    {
        return env('SLACK_WEBHOOK');
    }
}
