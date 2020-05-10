<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    public function product(){
        return $this->hasMany(ShopProduct::class,'category_id');
    }
}
