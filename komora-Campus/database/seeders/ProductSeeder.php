<?php

namespace Database\Seeders;

use App\Models\Matiere;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Début seeding : 10 produits (5 matières + 5 semestriels)');

        $matieres = Matiere::inRandomOrder()->take(8)->get(); // On en prend 8 différentes

        $products = [
            // 5 produits "matière" (lié à une matière spécifique)
            ['type' => 'matiere', 'title' => 'Cours + TD - Introduction au Droit',          'matiere' => $matieres[0], 'price_cfa' => 7500,  'is_corrected' => true],
            ['type' => 'matiere', 'title' => 'Cours + Examens corrigés - Droit Civil I',   'matiere' => $matieres[1], 'price_cfa' => 12000, 'is_corrected' => true],
            ['type' => 'matiere', 'title' => 'Algorithmique & Programmation (Cours + TP)', 'matiere' => $matieres[2], 'price_cfa' => 9000,  'is_corrected' => false],
            ['type' => 'matiere', 'title' => 'Bases de Données - SQL & Modélisation',      'matiere' => $matieres[3], 'price_cfa' => 11000, 'is_corrected' => true],
            ['type' => 'matiere', 'title' => 'Droit Pénal Général - Cours complet',        'matiere' => $matieres[4], 'price_cfa' => 8500,  'is_corrected' => false],

            // 5 produits "semestre" (tous les cours d’un semestre)
            ['type' => 'semestre', 'title' => 'Pack Complet Semestre 1 - L1 Droit 2024-2025',          'price_cfa' => 25000, 'is_corrected' => true],
            ['type' => 'semestre', 'title' => 'Pack Semestre 2 - L1 Informatique 2024-2025',           'price_cfa' => 28000, 'is_corrected' => false],
            ['type' => 'semestre', 'title' => 'Pack Semestre 1 - L2 Droit (avec corrigés)',            'price_cfa' => 35000, 'is_corrected' => true],
            ['type' => 'semestre', 'title' => 'Pack Semestre 2 - L2 Informatique',                     'price_cfa' => 32000, 'is_corrected' => false],
            ['type' => 'semestre', 'title' => 'Pack Semestre 1 - M1 Droit Administratif & Obligations','price_cfa' => 45000, 'is_corrected' => true],
        ];

        foreach ($products as $i => $p) {
            Product::updateOrCreate(
                ['title' => $p['title']], // unicité sur titre
                [
                    'type'          => $p['type'],
                    'matiere_id'    => $p['type'] === 'matiere' ? $p['matiere']->id : null,
                    'description'   => "Produit généré via seeder - " . now(),
                    'price_cfa'     => $p['price_cfa'],
                    'price_euro'    => null,
                    'period'        => '2024-2025',
                    'is_corrected'  => $p['is_corrected'],
                    'file_path'     => 'fichier/product_' . ($i + 1) . '.pdf',
                    'preview_path'  => 'img/product_' . ($i + 1) . '.jpg',
                    'diploma'       => null,
                ]
            );
        }

        Log::info('10 produits créés avec succès (4 corrigés, 6 non corrigés)');
    }
}