<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    //
    protected $fillable =[

        'registration_id',
        'special_request',
        'evidence',
        'subject',
        'object',
        'assesment',
        'planning',
    ];

    public function registration(){
        return $this->belongsTo(Registration::class);
    }

    public function resultLab(){
        return $this->hasOne(ResultLab::class);
    }
    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}