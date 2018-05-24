<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \Cartalyst\Sentinel\Users\EloquentUser
{
    use Notifiable;

    protected $fillable = [
        'email',
        'username',
        'password',
        'last_name',
        'first_name',
        'permissions',
        'name',
        'gender',
    ];

    protected $appends = ['image'];
    
    protected $loginNames = ['username'];

    public function getImageAttribute()
	{
        if($this->roles()->first()->slug == 'admin' || $this->roles()->first()->slug == 'superAdmin'){
            if($this->gender == 'M')
                $image = 'material/images/users/p3.png';
            else
                $image = 'material/images/users/p4.png';
        }
        else if($this->roles()->first()->slug == 'doctor' || $this->roles()->first()->slug == 'midwife' ){
            if($this->gender == 'M')
                $image = 'material/images/users/p1.png';
            else
                $image = 'material/images/users/p2.png';
        } else {
            if($this->gender == 'M')
                $image = 'material/images/users/p5.png';
            else
                $image = 'material/images/users/p6.png';
        }
		return $image;
	}
}
