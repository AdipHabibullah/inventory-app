<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id, //ambil kategori acak
            'name'        => fake()->word(),
            'price'       => fake()->numberBetween(10000, 100000),
            'stock'       => fake()->numberBetween(1, 100),
        ];
    }

    // public function definition(): array
    // {
    //     return [
    //        'name' => $this->faker->words(3, true),
    //         'price' => $this->faker->numberBetween(10000, 1000000), // Sesuai tipe BIGINT di image_d4c814.png
    //         'status' => $this->faker->randomElement(['tersedia', 'habis']), // Sesuai tipe ENUM di image_d4c814.png
    //         'stock' => $this->faker->numberBetween(1, 100), // Sesuai tipe INT di image_d4c814.png
    //         'description' => $this->faker->sentence(), // Sesuai tipe TEXT di image_d4c814.png
    //         'category_id' => $this->faker->randomElement([1, 2, 3, 4]), // Sesuai note: hanya ada 1,2,3,4
    //     ];
    // }
}
