<?php

namespace Database\Seeders;

use App\Models\Filiere;
use App\Models\Niveau;
use App\Models\Matiere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class FiliereNiveauMatiereSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Début du seeding : Filières → Niveaux → Matières');

        $data = [
            'Droit' => [
                'description' => 'Filière de Droit - Licence et Master',
                'matieres' => [
                    'L1' => ['Introduction au Droit', 'Droit Constitutionnel'],
                    'L2' => ['Droit Civil I', 'Droit Pénal Général'],
                    'M1' => ['Droit des Obligations', 'Droit Administratif'],
                ],
            ],
            'Informatique' => [
                'description' => 'Filière Informatique - Licence et Master',
                'matieres' => [
                    'L1' => ['Algorithmique & Programmation', 'Architecture des Ordinateurs'],
                    'L2' => ['Bases de Données', 'Programmation Orientée Objet'],
                    'M1' => ['Réseaux & Sécurité', 'Génie Logiciel'],
                ],
            ],
        ];

        foreach ($data as $nomFiliere => $info) {
            $filiere = Filiere::updateOrCreate(
                ['name' => $nomFiliere],
                [
                    'description' => $info['description'],
                    'emblem' => null,
                ]
            );

            foreach ($info['matieres'] as $niveauNom => $matieres) {
                $niveau = Niveau::updateOrCreate(
                    ['filiere_id' => $filiere->id, 'name' => $niveauNom],
                    ['name' => $niveauNom]
                );

                foreach ($matieres as $index => $nomMatiere) {
                    Matiere::updateOrCreate(
                        [
                            'niveau_id' => $niveau->id,
                            'name' => $nomMatiere ,
                        ],
                        [
                            'semester' => $index === 0 ? 'impair' : 'pair', // S1 = impair, S2 = pair
                        ]
                    );
                }
            }
        }

        Log::info('Seeding terminé : 2 filières, 6 niveaux, 12 matières créées avec succès');
    }
}