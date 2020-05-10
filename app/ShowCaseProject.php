<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowCaseProject extends Model
{
    public function service(){
        return $this->belongsTo(Service::class,'category_id');
    }

    public function photo(){
        return $this->hasMany(ProjectPhoto::class,'project_id');
    }
}
