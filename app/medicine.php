<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    //
    protected$fillable = [
        'name',
        'stock',
        'price',
    ];
}
