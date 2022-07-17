<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable=[
        'name',
        'stock_current',
        'stock_in',
        'stock_out',
    ];
}
