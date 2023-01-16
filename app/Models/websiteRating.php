<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class websiteRating extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'comment',
        'rate',
        'status',
      ];

      public function user()
      {
          return $this->belongsTo(User::class);
      }
}
