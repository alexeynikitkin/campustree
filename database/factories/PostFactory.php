<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'text' => $this->faker->sentence,
            'slug' => $slug,
            'category_id' => rand(1,10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
