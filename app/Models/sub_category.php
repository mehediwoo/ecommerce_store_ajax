<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(category::class,'cate_id','id');
    }

    public function child_category()
    {
        return $this->hasMany(child_category::class,'sub_cat_id','id')->where('status','enable');
    }
}
