<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    //
    protected $fillable =[

        'registration_id',
        'result',
        'special_request',
    ];

    public function registration(){
        return $this->belongsTo(Registration::class);
    }
    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}