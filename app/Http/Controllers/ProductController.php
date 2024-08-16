<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Product;

class ProductController extends Controller
{
    public function getUserProductsBoughtBy30Days($userId)
    {
        return Product::whereHas('orders', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                  ->where('orders.created_at', '>=', Carbon::now()->subDays(30));
        })->with(['orders' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])->get();
    }
}
