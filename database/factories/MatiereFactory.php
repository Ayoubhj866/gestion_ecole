<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matiere>
 */
class MatiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $filieres = [
            'Informatique',
            'Génie Civil',
            'Électronique',
            'Mécanique',
            'Biologie',
            'Chimie',
            'Mathématiques Appliquées',
            'Physique',
            'Droit',
            'Économie',
            'Gestion',
            'Langues Étrangères',
        ];

        return [
            'name' => fake()->randomElement($filieres),
        ];
    }
}
