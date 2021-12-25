<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'overview' => $this->faker->paragraph(),
            'bedrooms' => rand(1, 5),
            'bathrooms' => rand(1, 3),
            'why_buy' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph(),
            'price' => rand(100000, 500000),
            'saleOrRent' => rand(0, 1),
            'type' => rand(0, 2),
            'featured_image' => 'https://picsum.photos/id/1/1000/500',
            'location_id' => Location::all()->random()->id
        ];
    }
}
