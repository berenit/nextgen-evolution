<?php

namespace Database\Factories;

use App\Models\Vlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class IpClassFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'cidr' => fake()->word(),
            'description' => fake()->text(),
            'vlan_id' => Vlan::factory(),
        ];
    }
}
