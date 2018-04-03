<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable =[
        'name',
        'dob',
        'address',
        'blood_type',
        'gender',
        'phone',
        
    ];
}
