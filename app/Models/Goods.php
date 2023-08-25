<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Goods
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 */
class Goods extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];
}
