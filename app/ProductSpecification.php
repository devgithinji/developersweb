<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{

    protected $fillable = ['product_id','specification'];

    public function product(){
        return $this->belongsTo(ShopProduct::class,'product_id');
    }
}
