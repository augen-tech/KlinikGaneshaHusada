<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicinePrescription extends Model
{
    //
    public function prescription(){
        return $this->morphMany(Prescription::class);
    }
    public function medicine(){
        return $this->morphMany(Medicine::class);
    }
}
