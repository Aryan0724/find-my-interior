<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CityFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->city();
        return [
            'district_id' => District::factory(),
            'name'        => $name,
            'slug'        => Str::slug($name) . '-' . fake()->unique()->randomNumber(4),
            'is_active'   => true,
        ];
    }
}
