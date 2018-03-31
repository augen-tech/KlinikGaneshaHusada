<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicinePrescription extends Model
{
    //
    protected $fillable =[

        'prescription_id',
        'medicine_id',
        'amount',
    ];
    public function prescription(){
        return $this->morphMany(Prescription::class);
    }
    public function medicine(){
        return $this->morphMany(Medicine::class);
    }
}
