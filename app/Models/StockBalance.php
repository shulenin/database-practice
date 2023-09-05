<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class StockBalance
 * @package App\Models
 *
 * @property integer $id
 * @property integer $quantity
 * @property integer $goods_id
 * @property integer $stock_id
 *
 * @property Stock $stocks
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

    public function goods(): BelongsToMany
    {
        return $this->belongsToMany(Goods::class);
    }

    public function stocks(): BelongsToMany
    {
        return $this->belongsToMany(Stock::class);
    }
}
