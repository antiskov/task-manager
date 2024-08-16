<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }

    public static function getPopularProducts()
    {
        // Define the cache key
        $cacheKey = 'popular_products_' . Carbon::now()->format('Y_m');

        // Return cached results or fetch from database
        return Cache::remember($cacheKey, 60 * 60, function () {
            return self::select('products.*')
                ->join('order_product', 'products.id', '=', 'order_product.product_id')
                ->join('orders', 'order_product.order_id', '=', 'orders.id')
                ->where('orders.created_at', '>=', Carbon::now()->subMonth())
                ->groupBy('products.id')
                ->orderByRaw('COUNT(order_product.product_id) DESC')
                ->get();
        });
    }
}
