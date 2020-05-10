<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MileStone extends Model
{
    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }

    public function task(){
        return $this->hasMany(Task::class,'milestone_id');
    }

}
