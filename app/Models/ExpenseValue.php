<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class ExpenseValue extends Model
{
    protected $table = 'expense_values';

    protected $fillable = [

        'expense_type_id',
        'expense_type',
        'expense_value',
        'special_note',
        'month'
    ];
}
