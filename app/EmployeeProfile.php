<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    protected $fillable = ['user_id','gender','phone_number','address',
        'birthday','avatar','resume','facebook_account','twitter_account',
        'linkedin_account','website_url'];


    public function user(){
        return $this->belongsTo('App\Employee');
    }
}
