<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //
    protected $fillable =[

        'diagnosis_id',
        'status',
        'total_price',
    ];

    public function diagnosis(){
        return $this->belongsTo(Diagnosis::class);
    }
}
