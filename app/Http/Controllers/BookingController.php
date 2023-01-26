<?php

namespace App\Http\Controllers;
use App\Models\BookingService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
public function index(){
    $bookServices = BookingService::all();

    return view('admindashboard.bookCrud.book', compact('bookServices'));
}

    public function create(Request $request,$service_id)
    {
        $user_id = Auth::user()->id;

        $request->validate([
            'quantity' => 'required',
            'booking_date' => 'required|unique:booking_services',
            'worker_id' => 'required',
            'location'  => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'service_id'  => 'required',
            'total_price'  => 'required',
            // 'booking_date' => ['required', 'date', BookingService::unique('reservations', 'booking_date')->where(function ($query) {
            //     return $query->where('worker_id', request()->worker_id);
            // })->ignore(request()->reservation)],
        ]);

        // $validatedData = $request->validate([
        //     'date_time' => ['required', 'date', Rule::unique('reservations', 'date_time')->where(function ($query) {
        //         return $query->where('worker_id', request()->worker_id);
        //     })->ignore(request()->reservation)],
        // ]);

        BookingService::create($request->all());

        return redirect()->back()
                         ->with(['success' => 'Thank you, your reservation is confirmed .']);


        $booking = new BookingService;
        $booking->$user = Auth::user()->id;
        $booking->service_id = $service_id;
        $booking->booking_date = $request->booking_date;
        $booking->quantity  = $request->quantity;
        $booking->name  = $request->name;
        $booking->email  = $request->email;
        $booking->phone  = $request->phone;
        $booking->location  = $request->location;
        // $booking->note  = $request->note;
        $user = Auth::user()->id;
        $booking->worker_id =$request->worker_id ;

        $booking->save();
        return response()->json(['success' => 'booking successfully!']);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');


    }

    public function show( $id)
    {
        $bookService = BookingService::where('id', $id)->first();
        return view('admindashboard.bookCrud.show', compact('bookService'));


    }








}