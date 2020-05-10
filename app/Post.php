<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
        return $this->belongsTo(PostCategory::class,'category_id');
    }

    public function user(){
        return $this->belongsTo(Employee::class,'creator');
    }
}
