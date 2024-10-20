<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    // public function shipping(){

    //     return $this->belongsTo(billing_info::class, 'customer_id', 'id');
    // }
}
