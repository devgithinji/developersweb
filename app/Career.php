<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public function resposibility(){
        return $this->hasMany(Responsibility::class,'career_id');
    }

    public function application(){
        return $this->hasMany(CareerApplication::class,'job_id');
    }
}
