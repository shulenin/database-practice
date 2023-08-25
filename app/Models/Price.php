<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Price
 * @package App\Models
 *
 * @property integer $id
 * @property integer $value
 * @property integer $goods_id
 *
 * @property Goods $goods
 */
class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'goods_id',
    ];

    public function goods(): HasOne
    {
        return $this->hasOne(Goods::class);
    }
}
