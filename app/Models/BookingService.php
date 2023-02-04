<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{

    use HasFactory;
    protected $fillable = [
        'worker_id',
        'service_id',
        'quantity',
        'booking_date',
        'booking_time',
        'name',
        'note',
        'email',
        'phone',
        'location',
        'user_id',
        'total_price',
        'status'

    ];

    public function Service()
    {
        return $this->belongsTo(Service::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function worker()
    {
        return $this->belongsTo(User::class);
    }

    // public static function CreateBooking($book_id, $quantity)
    // {
    //     $book = product::findOrFail($book_id);
    //     $cart = Session::get('cart', []);

    //     if (isset($cart[$book_id])) {
    //         $cart[$book_id]['quantity'] = $cart[$book_id]['quantity'] + $quantity;
    //     } else {
    //         $cart[$book_id] = [
    //             "name" => $book->book_name,
    //             "quantity" => $quantity,
    //             "price" => $book->price,
    //             "image_url" => $book->image
    //         ];
    //     }

    //     Session::put('cart', $cart);
    // }
}
