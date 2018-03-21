<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    //
    public function diagnosis(){
        return $this->belongsTo(diagnosis::class);
    }
}
