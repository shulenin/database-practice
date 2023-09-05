<?php

namespace Database\Factories;

use App\Models\CharKind;
use App\Models\Goods;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CharacteristicsValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $goodsIds = Goods::all()->pluck('id')->toArray();
        $charKindIds = CharKind::all()->pluck('id')->toArray();

        return [
            'goods_id' => $this->faker->randomElement($goodsIds),
            'char_kind_id' => $this->faker->randomElement($charKindIds),
            'value' => rand(1000, 9999),
        ];
    }
}
