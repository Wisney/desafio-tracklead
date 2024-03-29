<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'name' => $this->faker->word(),
            'location' => $this->faker->words(3, true),
            'description' => $this->faker->words(3, true)
        ];
    }
}
