<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

/**
 * Class Stock
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 *
 * @property StockBalance $stockBalances
 */
class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function stockBalances(): hasMany
    {
        return $this->hasMany(StockBalance::class);
    }
}
