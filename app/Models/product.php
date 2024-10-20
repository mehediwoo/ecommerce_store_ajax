<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(category::class, 'cat_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(sub_category::class, 'sub_cat_id', 'id');
    }
    public function childcategory()
    {
        return $this->belongsTo(child_category::class, 'child_cat_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id', 'id');
    }

}
