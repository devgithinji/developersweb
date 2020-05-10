<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function milestone(){
        return $this->belongsTo(MileStone::class,'milestone_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'developer_id');
    }

    public  function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
