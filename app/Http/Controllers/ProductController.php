<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Product;

class ProductController extends Controller
{
    public function getPopularProducts()
    {
        return Product::getPopularProducts();
    }
}
