<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'email',
        'password',
        'phone',
        'type',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 public function services()
    {
        return $this->belongsToMany(Service::class, 'user_services');
    }
 public function bookingservice()
    {
        return $this->hasMany(BookingService::class);
    }


 public function ReviewData()
    {
        return $this->hasMany('App\Models\Rating','worker_id');

    }
 public function serviceSection()
    {
        return $this->hasMany('App\Models\UserService','user_id');

    }
 public function serviceuser()
    {
        return $this->hasMany('App\Models\Service');

    }



    public function rating()
    {
        return $this->hasMany('App\Models\Rating','worker_id');
    }

    public function reviews()
    {
        return $this->belongsTo(websiteRating::class);
    }




}

