<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $client = Client::first();
        return [
            'date' => "02-09-2022",
            'material' => Str::random(10),
            'place' => $this->faker->name(),
            'freight_value' => 2000,
            'paid' => 0,
            'debt_value' => 0,
            'price' => 30000,
            'debt_date' => "02-09-2022",
            'client_id' => $client->id,
        ];
    }
}
