<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Str;
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
    public function definition()
    {

        return [
            'brand_id' => function () {
                return Brand::all()->random();
            },
            'product_condition_id' => '1',
            'title' => $this->faker->unique()->sentence(),
            'slug' => Str::slug($this->faker->unique()->sentence(), '-'),
            'summary' => $this->faker->text($maxNbChars = 200),
            'description' => $this->faker->text($maxNbChars = 1000),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'price' =>  $this->faker->numberBetween($min = 500, $max = 700),
            'discounted_price' => $this->faker->numberBetween($min = 300, $max = 499),
            'quantity' => $this->faker->randomDigit(),
            'in_stock' => true,
            'is_featured' => true,
            'is_active' => true,

        ];
    }
}
