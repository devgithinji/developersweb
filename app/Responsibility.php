<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsibility extends Model
{

    public $fillable = ['career_id','description'];
    public function career(){
        return $this->belongsTo(Career::class,'career_id');
    }
}
