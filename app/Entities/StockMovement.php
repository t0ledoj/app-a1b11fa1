<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'sku',
        'is_in',
        'quantity'
    ];
}
