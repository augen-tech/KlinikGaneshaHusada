<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultLab extends Model
{
    //
    public function diagnosis(){
        return $this->belongsTo(Diagnosis::class);
    }
}
