<?php

namespace Database\Factories;

use App\Models\IpClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrivateIpFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ip' => fake()->word(),
            'description' => fake()->text(),
            'macAddress' => fake()->word(),
            'ip_class_id' => IpClass::factory(),
        ];
    }
}
