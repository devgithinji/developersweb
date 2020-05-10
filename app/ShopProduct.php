<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
   public function category(){
       return $this->belongsTo(ShopCategory::class,'category_id');
   }

   public function specification(){
       return $this->hasMany(ProductSpecification::class,'product_id');
   }
}
