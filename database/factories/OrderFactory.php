<?php


namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(), 
            'total_price' => $this->faker->randomFloat(2, 20, 500), 
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed']),
            'address' => $this->faker->address(), //
        ];
    }
}
