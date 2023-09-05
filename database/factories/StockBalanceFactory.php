<?php

namespace Database\Factories;

use App\Models\Goods;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockBalance>
 */
class StockBalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $goodsIds = Goods::all()->pluck('id')->toArray();
        $stockIds = Stock::all()->pluck('id')->toArray();

        return [
            'stock_id' => $this->faker->randomElement($stockIds),
            'goods_id' => $this->faker->randomElement($goodsIds),
            'quantity' => rand(50, 250),
        ];
    }
}
