<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('get_products_by_30_days/{userId}', [ProductController::class, 'getUserProductsBoughtBy30Days']);