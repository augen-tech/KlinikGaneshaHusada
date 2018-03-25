<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //
    public function diagnosis(){
        return $this->belongsTo(Diagnosis::class);
    }
}
