<?php

namespace Database\Factories;

use App\Models\Livro;
use App\Models\Resenha;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Resenha>
 */
class ResenhaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        return [
            'texto'    => fake('pt_BR')->realText(200),
            'user_id'  => User::inRandomOrder()->value('id'),
            'livro_id' => Livro::inRandomOrder()->value('id'),
        ];
    }
}
