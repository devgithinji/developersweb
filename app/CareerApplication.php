<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
   public function user(){
       return $this->belongsTo(User::class,'user_id');
   }

   public function job(){
       return $this->belongsTo(Career::class,'job_id');
   }
}
