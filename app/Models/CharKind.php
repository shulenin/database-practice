<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CharKind
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 */
class CharKind extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
