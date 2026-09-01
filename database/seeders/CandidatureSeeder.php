<?php

namespace Database\Seeders;

use App\Models\Candidature;
use Illuminate\Database\Seeder;

class CandidatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = [
            [
                'code_dossier' => '2026-UNEK-4819',
                'nom' => 'MAHAMAT',
                'prenom' => 'Ali Hassan',
                'genre' => 'M',
                'date_naissance' => '2005-04-12',
                'nationalite' => 'Tchadienne',
                'telephone' => '+235 66 28 44 10',
                'email' => 'mahamat.ali@gmail.com',
                'adresse' => 'Quartier Moursal, N\'Djamena',
                'cycle' => 'Licence 1',
                'faculte' => 'Faculté des Sciences et Techniques',
                'filiere' => 'Génie Logiciel',
                'statut' => 'admis',
                'remarques_admin' => 'Bac S mention Bien. Dossier complet et admis.',
            ],
            [
                'code_dossier' => '2026-UNEK-9204',
                'nom' => 'ABAKAR',
                'prenom' => 'Fatimé Djimet',
                'genre' => 'F',
                'date_naissance' => '2006-01-20',
                'nationalite' => 'Tchadienne',
                'telephone' => '+235 99 44 12 30',
                'email' => 'fatime.abakar@gmail.com',
                'adresse' => 'Quartier Ardep-djoumbal, N\'Djamena',
                'cycle' => 'Licence 1',
                'faculte' => 'Faculté des Sciences Humaines, Juridiques et de Gestion',
                'filiere' => 'Droit Privé',
                'statut' => 'en_attente',
                'remarques_admin' => null,
            ],
            [
                'code_dossier' => '2026-UNEK-3150',
                'nom' => 'YOUSSOUF',
                'prenom' => 'Ibrahim Souleymane',
                'genre' => 'M',
                'date_naissance' => '2004-11-08',
                'nationalite' => 'Tchadienne',
                'telephone' => '+235 66 55 90 20',
                'email' => 'ibrahim.youssouf@yahoo.fr',
                'adresse' => 'Sabangali, N\'Djamena',
                'cycle' => 'Master 1',
                'faculte' => 'Faculté des Sciences et Techniques',
                'filiere' => 'Réseaux & Télécommunications',
                'statut' => 'admis',
                'remarques_admin' => 'Licence validée. Admis en Master 1.',
            ],
            [
                'code_dossier' => '2026-UNEK-7712',
                'nom' => 'KHAMIS',
                'prenom' => 'Aïcha Oumar',
                'genre' => 'F',
                'date_naissance' => '2005-09-15',
                'nationalite' => 'Tchadienne',
                'telephone' => '+235 90 11 22 33',
                'email' => 'aicha.khamis@gmail.com',
                'adresse' => 'Chagoua, N\'Djamena',
                'cycle' => 'Licence 1',
                'faculte' => 'Faculté des Sciences Humaines, Juridiques et de Gestion',
                'filiere' => 'Comptabilité & Finance',
                'statut' => 'incomplet',
                'remarques_admin' => 'La photo de la CNI est floue. Merci de renvoyer un scan net.',
            ],
            [
                'code_dossier' => '2026-UNEK-5421',
                'nom' => 'DJIMBANGAR',
                'prenom' => 'Koolengar Emmanuel',
                'genre' => 'M',
                'date_naissance' => '2005-06-30',
                'nationalite' => 'Tchadienne',
                'telephone' => '+235 66 12 90 88',
                'email' => 'djimbangare@gmail.com',
                'adresse' => 'Moundou, Tchad',
                'cycle' => 'Licence 1',
                'faculte' => 'Faculté des Sciences et Techniques',
                'filiere' => 'Agronomie',
                'statut' => 'en_attente',
                'remarques_admin' => null,
            ],
            [
                'code_dossier' => '2026-UNEK-1098',
                'nom' => 'IDRISS',
                'prenom' => 'Zenaba Mahamat',
                'genre' => 'F',
                'date_naissance' => '2003-03-25',
                'nationalite' => 'Tchadienne',
                'telephone' => '+235 99 88 77 66',
                'email' => 'zenaba.idriss@gmail.com',
                'adresse' => 'Abéché, Tchad',
                'cycle' => 'Master 1',
                'faculte' => 'Faculté des Sciences Humaines, Juridiques et de Gestion',
                'filiere' => 'Gestion de Projets',
                'statut' => 'admis',
                'remarques_admin' => 'Dossier validé pour la rentrée 2026-2027.',
            ]
        ];

        foreach ($candidates as $cand) {
            Candidature::updateOrCreate(
                ['code_dossier' => $cand['code_dossier']],
                $cand
            );
        }
    }
}
