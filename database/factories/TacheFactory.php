<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tache>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nom"           => fake()->name(),
            "description"   => fake()->text(300),
            "message_id"    => rand(1, 200),
            "board_id"      => rand(1, 200),
            'priorite'      => fake()->randomElement(["Urgent", "Important", "Normal"]),
            'status'        => fake()->randomElement(["A faire", "En cours", "En revue", "Terminier"]),
            'ordre'         => rand(1, 50),
            'echeance'      => fake()->date()
        ];
    }
}
