<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'image',
        'image2',
        'image3',
        'image4',
        'category_id',
        'price',
        'description',




    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_services');
    }

    public function bookingservices()
    {
        return $this->hasMany(BookingService::class);
    }

    public function order()
    {
        return $this->belongsTo(order_item::class);
    }

}
