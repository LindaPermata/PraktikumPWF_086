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
            'name' => fake()->randomElement([
                'Matte Lip Cream', 'Daily Liquid Foundation', 'Bright Face Wash',
                'Niacinamide Serum', 'Hydrating Treatment Essence', 'Poreless Fluid Foundation',
                'Cheek & Lip Tint', 'Matcha Oat Cleanser', 'Hydrasoothe Sunscreen Gel',
                'Ceramide Barrier Repair Moisture Gel', 'Urban Lip Cream Matte',
                'Flawless Cushion Foundation', 'Make It Glow Cushion',
                'Brightening Body Lotion', 'Brightening Face Toner', 'Gold Water Essence',
                'Centella Asiatica Face Toner', 'Milk Cleanser', 'Micellar Water',
                'Fit Me Matte Foundation', 'Hyaluronic Acid Serum', 'Acne Spot Treatment'
            ]),
            'qty' => fake()->numberBetween(1, 100),
            'price' => fake()->numberBetween(10, 500) * 1000,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
