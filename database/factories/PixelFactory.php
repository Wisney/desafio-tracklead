<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PixelFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'platform' => $this->faker->randomElement(['Meta', 'Google Ads', 'Analytics', 'Tiktok']),
            'code' => Str::random(25)
        ];
    }
}
