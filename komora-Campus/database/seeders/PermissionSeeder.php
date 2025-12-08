<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Début du seeding des permissions');

        $user = User::where('role', 'user')->first();
        if (!$user) {
            Log::warning('Aucun utilisateur avec role "user" trouvé. Seeder Permission annulé.');
            return;
        }

        $products = Product::orderBy('id')->limit(2)->get();
        if ($products->count() < 2) {
            Log::warning('Moins de 2 produits en base. Permissions non attribuées.');
            return;
        }

        foreach ($products as $product) {
            Permission::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        Log::info("Permissions accordées à l'utilisateur {$user->email} sur les 2 premiers produits (ID: {$products->pluck('id')->join(', ')})");
    }
}