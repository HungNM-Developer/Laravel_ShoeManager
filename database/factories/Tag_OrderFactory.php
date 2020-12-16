<?php

namespace Database\Factories;

use App\Models\Tag_Order;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Order;
use App\Models\Tag;

class Tag_OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag_Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'order_id' => Order::all()->random()->id, 
            'tag_id' => Tag::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
