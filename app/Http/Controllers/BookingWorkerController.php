<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BookingService;

class BookingWorkerController extends Controller
{
    public function index()
    {

    $bookings =BookingService::all()-> where('worker_id', '=', Auth::user()->id);
    return view('workerdashboard.bookCrud.book', compact('bookings'));


}

public function show( $id)
{
    $booking = BookingService::where('id', $id)->first();
    return view('workerdashboard.bookCrud.show', compact('booking'));


}



public function edit( $id)
{
    $booking = BookingService::where('id',$id)->first();
    return view('workerdashboard.bookCrud.edit', compact('booking'));
}


public function update(Request $request,$id)
{
    $booking = BookingService::where('id',$id)->first();
    $request->validate([
        'status' => 'required',


    ]);

    $input = $request->all();
    $booking->update($input);

    return redirect()->route('bookingWorker.index')
        ->with('success', 'Booking updated successfully');
}




}
