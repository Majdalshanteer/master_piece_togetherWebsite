<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'total',
        'status',
        'note',
        'phone',
        'address',
        'created_at',
        'updated_at',
    ];


        public function user()
    {
        return $this->belongsTo(user::class);
    }
 public function service()
    {
        return $this->belongsTo(order_item::class);
    }
 public function orderItem()
    {
        return $this->hasMany(order_item::class);
    }


}
