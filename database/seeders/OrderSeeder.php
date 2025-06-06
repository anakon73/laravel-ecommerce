<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();

        Order::factory()->count(10)->create()->each(function ($order) use ($products) {
            $items = $products->random(rand(1, 4));

            $total = 0;

            foreach ($items as $product) {
                $quantity = rand(1, 3);
                $price = $product->price;

                OrderItem::create([
                    'order_id' => $order->id,
                    'name' => $product->name,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);

                $total += $price * $quantity;
            }

            $order->update(['total' => $total]);
        });
    }
}
