<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $products = Product::all();

        foreach ($orders as $order) {
            OrderItem::factory(rand(1, 5))->create([
                'order_id' => $order->id,
                'product_id' => $products->random()->id,
                'price' => $products->random()->price,
            ]);
        }
    }
}
