<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    //
    protected $fillable =[
        'id',
        'patient_id',
        'complaint',
        'type',
        'blood_pressure',
        'state',

    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function diagnosis(){
        return $this->hasOne(Diagnosis::class);
    }
}
