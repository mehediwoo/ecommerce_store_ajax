<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class child_category extends Model
{
    use HasFactory;

    public function sub_category()
    {
        return $this->belongsTo(sub_category::class,'sub_cat_id','id');
    }
}
