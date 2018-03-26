<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    //
    
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
