<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Début seeding : 10 commandes (dont 2 échouées)');

        $user = User::where('role', 'user')->firstOrFail();
        $products = Product::inRandomOrder()->get();

        // 8 commandes réussies
        for ($i = 1; $i <= 8; $i++) {
            $items = $products->random(rand(1, 3));
            $total = $items->sum('price_cfa');

            $order = Order::create([
                'user_id'          => $user->id,
                'total_amount'     => $total,
                'status'           => 'paid',
                'payment_provider' => $i % 2 == 1 ? 'MTN' : 'Orange Money',
                'transaction_id'   => 'TRANS' . str_pad($i, 8, '0', STR_PAD_LEFT),
                'created_at'       => now()->subDays(8 - $i),
            ]);

            foreach ($items as $product) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'price'      => $product->price_cfa,
                ]);
            }
        }

        // 2 commandes échouées
        foreach (range(9, 10) as $i) {
            $items = $products->random(rand(1, 2));
            $total = $items->sum('price_cfa');

            $order = Order::create([
                'user_id'          => $user->id,
                'total_amount'     => $total,
                'status'           => 'failed',
                'payment_provider' => 'MTN',
                'transaction_id'   => 'FAIL' . str_pad($i, 8, '0', STR_PAD_LEFT),
                'created_at'       => now()->subDays(10 - $i),
            ]);

            foreach ($items as $product) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'price'      => $product->price_cfa,
                ]);
            }
        }

        Log::info('10 commandes créées (8 payées, 2 échouées)');
    }
}