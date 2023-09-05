<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Goods
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 *
 * @property Price $price
 * @property StockBalance $stockBalances
 */
class Goods extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function price(): HasOne
    {
        return $this->hasOne(Price::class);
    }

    public function stockBalances(): HasMany
    {
        return $this->hasMany(StockBalance::class);
    }
}
