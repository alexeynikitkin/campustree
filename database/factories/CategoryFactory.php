<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word;
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'slug' => $slug,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
