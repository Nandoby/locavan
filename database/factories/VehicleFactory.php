<?php

namespace Database\Factories;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomFloat(2, 50, 100),
            'year' => $this->faker->year(),
            'length' => $this->faker->numberBetween(6, 10),
            'height' => $this->faker->numberBetween(2, 4),
            'width' => $this->faker->numberBetween(2, 3),
            'km' => $this->faker->numberBetween(1000, 100000),
            'model' => $this->faker->words(3, true),
            'clean_water' => $this->faker->numberBetween(50, 100),
            'waste_water' => $this->faker->numberBetween(50, 100),
            'seats' => $this->faker->numberBetween(2, 5),
            'beds' => $this->faker->numberBetween(2, 5),
            'city' => $this->faker->city,
            'description' => $this->faker->sentences(3, true),
            'animals' => $this->faker->boolean,
            'travel_abroad' => $this->faker->boolean,
            'type_id' => Type::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
