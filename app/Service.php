<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $fillable = ['name','description','icon'];

    public function project(){
        return $this->hasMany(Project::class,'type');
    }

    public function quotation(){
        return $this->hasMany(Quotations::class,'service');
    }
}
