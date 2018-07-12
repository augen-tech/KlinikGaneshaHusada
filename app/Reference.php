<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    //
    protected $fillable =[

        'diagnosis_id',
        'hospital',
        'address',
        'message',
    ];

    public function diagnosis(){
        return $this->belongsTo(Diagnosis::class);
    }

}
