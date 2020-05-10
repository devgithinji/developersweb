<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public function pdct(){
        return $this->belongsTo(ShopProduct::class,'product_id');
    }
}
