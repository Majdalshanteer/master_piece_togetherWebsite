<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function OrderDetail()
    {
        return $this->hasMany(order_detail::class);
    }
    public function serviceName()
    {
        return $this->hasMany(order_detail::class);
    }

    public function Service()
    {
        return $this->hasMany(Service::class);
    }


}
