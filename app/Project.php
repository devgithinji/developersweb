<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function service(){
        return $this->belongsTo(Service::class,'type');
    }

    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }

    public function milestone(){
        return $this->hasMany(MileStone::class,'project_id');
    }

    public function task(){
        return $this->hasMany(Task::class,'project_id');
    }

}
