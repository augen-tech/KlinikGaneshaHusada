<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    //
    public function registration(){
        return $this->belongsTo(Registration::class);
    }
}
