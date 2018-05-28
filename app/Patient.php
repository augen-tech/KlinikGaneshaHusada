<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable =[
        'name',
        'dob',
        'address',
        'blood_type',
        'gender',
        'phone',
        'religion',
        'parent_name',
        'parent_job',
        'child_order',
        'birth_weight',
        'birth_attendant',
        'labor_method',
        'job',
        'allergy_history',
        'disease_history',
        'disease_history_family',
        
    ];
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    
}
