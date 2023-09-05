<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class CharacteristicsValue
 * @package App\Models
 *
 * @property integer $id
 * @property integer $value
 * @property integer $goods_id
 * @property integer $char_kind_id
 *
 * @property Goods $goods
 * @property CharKind $charKind
 */
class CharacteristicsValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'goods_id',
        'char_kind_id',
    ];

    public function goods(): BelongsTo
    {
        return $this->belongsTo(Goods::class);
    }

    public function charKind(): BelongsToMany
    {
        return $this->belongsToMany(CharKind::class);
    }
}
