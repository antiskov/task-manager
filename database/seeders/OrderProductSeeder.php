<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all orders and products
        $orders = Order::all();
        $products = Product::all();

        foreach ($orders as $order) {
            // Ensure there are products to attach
            if ($products->count() > 0) {
                $order->products()->attach(
                    $products->random(rand(1, 5))->pluck('id')->toArray()
                );
            }
        }
    }
}
