<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    //
    protected $fillable =[

        'registration_id',
        'result',
    ];

    public function registration(){
        return $this->belongsTo(Registration::class);
    }
}