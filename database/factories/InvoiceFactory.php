<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        /**
         * $table->dateTime('date');
         **   $table->decimal('value');
          *  $table->string('file');
          *  $table->longText('obs')->nullable();
         */

        $client = \App\Models\Client::first();
        return [
            'date' => $this->faker->dateTimeBetween(),
            'value' => $this->faker->randomFloat(2),
            'file' => 'invoice_1.png',
            'obs' => $this->faker->text(),
            'client_id' => $client->id,
        ];
    }
}
