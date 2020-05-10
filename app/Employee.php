<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $guard = 'employee';

    protected $fillable = ['name','email','password'];


    protected $hidden = ['password','remember_token'];

    public function profile(){
        return $this->hasOne(EmployeeProfile::class,'user_id');
    }

    public function task(){
        return $this->hasMany(Task::class,'developer_id');
    }
}
