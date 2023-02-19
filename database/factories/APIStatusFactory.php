<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\APIStatus>
 */
class APIStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dateImport'       => $this->faker->iso8601(),
            'status'           => $this->faker->sentence(),
            'memoryConsumed'   => $this->faker->word()
        ];
    }
}
