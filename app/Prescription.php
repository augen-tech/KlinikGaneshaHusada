<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //
    protected $fillable =[

        'diagnosis_id',
        'notation',
    ];

    public function diagnosis(){
        return $this->belongsTo(Diagnosis::class);
    }
}
