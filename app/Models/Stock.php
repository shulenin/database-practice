<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 */
class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
