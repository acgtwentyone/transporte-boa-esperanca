<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fuel>
 */
class FuelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween(),
            'value' => $this->faker->randomFloat(2),
            'file' => 'fuel_1.png',
            'driver' => $this->faker->name(),
            'plate' => 'ST-' . $this->faker->regexify('[A-Z]{2}') . '-' . $this->faker->regexify('[A-Z]{2}'),
            'obs' => $this->faker->text(),
        ];
    }
}
