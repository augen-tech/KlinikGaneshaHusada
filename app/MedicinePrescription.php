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
        'notation',
    ];
    public function prescription(){
        return $this->hasMany(Prescription::class);
    }
    public function medicine(){
        return $this->hasMany(Medicine::class);
    }
}
