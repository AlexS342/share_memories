<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => 1,
            'album_id' => null,
            'cover' => null,
            'name' => fake()->text(10),
            'description' => fake()->text(50),
            'rights' => 'Только мне',
            'created_at' => now()->format('U'),
            'updated_at' => now()->format('U'),
            'deleted_at' => null,
        ];
    }
}
