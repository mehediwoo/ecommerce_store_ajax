<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function sub_category()
    {
        return $this->hasMany(sub_category::class,'cate_id','id')->where('status','enable')->latest();
    }

    // for home category product
    public function home_category_product()
    {
        return $this->hasMany(product::class,'cat_id','id')->where('status','enable')->latest();
    }
}
