<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Eleve;
use App\Models\Filiere;
use App\Models\Instructeur;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create roles (the first is admin)
        $this->call(RoleSeeder::class);

        // Create user with admin role
        User::factory()->count(1)->create([
            'name' => 'ayoub',
            'email' => 'ayoub@gmail.com',
        ])->each(function (User $user) {
            $user->assignRole('admin');
        });

        Instructeur::factory()
            ->count(5)
            ->has(Matiere::factory()->count(rand(1, 2)) // affecter 1 ou 2 matière pour chaque instructeur
                ->has(Filiere::factory()->count(rand(1, 2)) // une matière peut être dans une ou 2 filières
                    ->has(Eleve::factory()->count(rand(20, 50))) // crier un nombre d'èléves entre 20 et 50 pour chaque filière
                ))->create();
    }
}
