<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }

    public static function getUserProductsBoughtBy30Days($userId)
    {
        return Product::whereHas('orders', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                  ->where('orders.created_at', '>=', Carbon::now()->subDays(30));
        })->with(['orders' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])->get();
    }
}
