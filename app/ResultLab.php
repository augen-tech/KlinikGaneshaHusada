<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultLab extends Model
{
    //
    protected $fillable =[
        'id',
        'diagnosis_id',
        'result',
        'price',
    ];

    public function diagnosis(){
        return $this->belongsTo(Diagnosis::class);
    }

    
}
