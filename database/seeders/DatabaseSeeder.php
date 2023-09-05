<?php

namespace Database\Seeders;

use App\Models\CharacteristicsValue;
use App\Models\CharKind;
use App\Models\Goods;
use App\Models\Price;
use App\Models\Stock;
use App\Models\StockBalance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Goods::factory()->count(30)->create();
        CharKind::factory()->count(20)->create();
        Stock::factory()->count(10)->create();
        CharacteristicsValue::factory()->count(50)->create();
        StockBalance::factory()->count(50)->create();
        Price::factory()->count(30)->create();
    }
}
