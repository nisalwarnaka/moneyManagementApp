<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $income_type)
 * @method static create(array $array)
 */

class IncomeValue extends Model
{
    protected $table = 'income_values';
    protected $fillable = [
        'income_type_id',
        'income_type',
        'income_value',
        'special_note',
        'month',
    ];
}
