<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diagnosis extends Model
{
    //
    public function registration(){
        return $this->belongsTo(registration::class);
    }
}
