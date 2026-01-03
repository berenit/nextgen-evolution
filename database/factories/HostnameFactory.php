<?php

namespace Database\Factories;

use App\Models\privateIp;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostnameFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'private_ip_id' => privateIp::factory(),
        ];
    }
}
