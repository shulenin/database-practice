<?php

namespace Database\Factories;

use App\Models\Goods;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $goodsIds = Goods::all()->pluck('id')->toArray();

        return [
            'goods_id' => $this->faker->randomElement($goodsIds),
            'value' => rand(250, 2000),
        ];
    }
}
