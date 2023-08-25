<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class StockBalance
 * @package App\Models
 *
 * @property integer $id
 * @property integer $quantity
 * @property integer $goods_id
 * @property integer $stock_id
 *
 * @property Stock $stock
 * @property Goods $goods
 */
class StockBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'goods_id',
        'stock_id',
    ];

    public function stock(): HasOne
    {
        return $this->hasOne(Stock::class);
    }

    public function goods(): HasOne
    {
        return $this->hasOne(Goods::class);
    }
}
