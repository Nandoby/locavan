<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('-3 months');
        $duration = rand(3, 10);

        return [
            'start_date' => $startDate,
            'end_date' => (clone $startDate)->modify("+$duration days"),
            'user_id' => User::all()->random()->id,
            'vehicle_id' => Vehicle::all()->random()->id,
        ];
    }
}
