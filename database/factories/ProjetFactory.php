<?php

namespace Database\Factories;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projet>
 */
class ProjetFactory extends Factory
{

    protected $model = Projet::class; 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nom" => fake()->name(), 
            "image" => '/images/default_user.jpg', 
            "description" => fake()->text(400), 
            "echeance" => fake()->date()
        ];
    }
}
