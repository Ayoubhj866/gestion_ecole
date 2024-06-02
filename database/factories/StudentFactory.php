<?php

namespace Database\Factories;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->firstName(),
            'filiere_id' => function () {
                return Filiere::factory()->create()->id;
            },
            'prenom' => fake()->lastName(),
            'tel' => fake()->phoneNumber(),
            'adresse' => fake()->address(),
            'sexe' => fake()->randomElement(['m', 'f']),
            'email' => fake()->unique()->safeEmail(),
            'cin' => $this->generateUniqueNumber(),
        ];
    }

    private function generateUniqueNumber()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $letters = $characters[rand(0, 25)].$characters[rand(0, 25)];
        $numbers = rand(1000, 999999); // Génère un nombre entre 1000 et 999999

        return $letters.$numbers;
    }
}
