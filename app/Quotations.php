<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
    public function type(){
        return $this->belongsTo(Service::class,'service');
    }
}
