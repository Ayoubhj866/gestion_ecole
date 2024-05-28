<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filiere>
 */
class FiliereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $matieres = [
            'Mathématiques',
            'Physique',
            'Chimie',
            'Biologie',
            'Informatique',
            'Anglais',
            'Histoire',
            'Géographie',
        ];

        return [
            'name' => fake()->randomElement($matieres),
        ];
    }
}
