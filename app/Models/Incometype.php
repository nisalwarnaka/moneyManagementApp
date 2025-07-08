<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incometype extends Model
{
    protected $table = 'income_types';
    protected $fillable = [
        'income_type',
        'max_amount',
        'min_amount'
    ];
}
