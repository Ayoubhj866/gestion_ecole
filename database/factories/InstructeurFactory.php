<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructeur>
 */
class InstructeurFactory extends Factory
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
