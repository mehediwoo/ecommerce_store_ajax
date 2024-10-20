<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer;
use App\Models\billing_info;

class order extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id', 'id');
    }

    public function billing_info()
    {
        return $this->belongsTo(billing_info::class, 'customer_id', 'customer_id');
    }
}
