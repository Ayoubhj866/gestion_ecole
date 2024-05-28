<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Eleve;
use App\Models\Filiere;
use App\Models\Instructeur;
use App\Models\Matiere;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $user = $this->call(UserSeeder::class);

        Eleve::factory(20)->create();
        $instructeurs = Instructeur::factory(5)->create();
        $matieres = Matiere::factory(20)->create();
        $filieres = Filiere::factory(4)->create();

        // attacher matières et filière
        foreach ($matieres as $matiere) {
            $filiere = Filiere::find(rand(1, 4));
            $matiere->filieres()->attach($filiere);
        }

        // attacher les instructeur avec les matières
        foreach ($matieres as $matiere) {
            $instructeur = Instructeur::find(rand(1, 5));
            $matiere->instructeurs()->attach($instructeur);
        }
    }
}
