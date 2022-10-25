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
            "nom"=> fake()->name(), 
            "description" =>fake()->text(300), 
            "message_id" => rand(1,200), 
            "projet_id"=> rand(1, 20), 
            "board_id" => rand(1,200)
        ];
    }
}
