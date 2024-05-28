<?php

namespace Database\Factories;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class EleveFactory extends Factory
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
            'date_naissance' => fake()->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
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
