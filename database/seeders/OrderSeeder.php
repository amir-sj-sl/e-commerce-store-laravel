<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        foreach ($users as $user) {
            $orders = Order::factory(rand(1, 3))->create([
                'user_id' => $user->id,
            ]);

            foreach ($orders as $order) {
                OrderItem::factory(rand(1, 5))->make()->each(function ($orderItem) use ($order, $products) {
                    $product = $products->random();

                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $product->id;
                    $orderItem->price = $product->price;
                    $orderItem->save();
                });
            }
        }
    }
}
