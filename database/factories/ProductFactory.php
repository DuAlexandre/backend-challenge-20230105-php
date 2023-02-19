<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code'             => $this->faker->randomNumber(),
            'status'           => $this->faker->word(),
            'imported_t'       => $this->faker->iso8601(),
            'url'              => $this->faker->url(),
            'creator'          => $this->faker->word(),
            'created_t'        => $this->faker->unixTime(),
            'last_modified_t'  => $this->faker->unixTime(),
            'product_name'     => $this->faker->word(),
            'quantity'         => $this->faker->word(),
            'brands'           => $this->faker->word(),
            'categories'       => $this->faker->sentence(),
            'labels'           => $this->faker->sentence(),
            'cities'           => $this->faker->word(),
            'purchase_places'  => $this->faker->word(),
            'stores'           => $this->faker->word(),
            'ingredients_text' => $this->faker->sentence(),
            'traces'           => $this->faker->sentence(),
            'serving_size'     => $this->faker->sentence(),
            'serving_quantity' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
            'nutriscore_score' => $this->faker->randomNumber(),
            'nutriscore_grade' => $this->faker->randomLetter(),
            'main_category'    => $this->faker->word(),
            'image_url'        => $this->faker->url(),
        ];
    }
}
