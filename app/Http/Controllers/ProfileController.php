<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BookingService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\order_detail;
use App\Models\order_item;
use App\Models\Rating;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = DB::table('order_details')->join('users', 'order_details.user_id', '=', 'users.id')
        ->select('order_details.*', 'users.name')->where('user_id','=',Auth::user()->id)->get();

    $bookingdetails = DB::table('booking_services')
    ->join('users', 'booking_services.worker_id', '=', 'users.id')
    ->join('services', 'booking_services.service_id', '=', 'services.id')
    ->select('booking_services.*', 'users.*', 'services.*')
    ->where('user_id','=',Auth::user()->id)
    ->get();
    $bookCount=count($bookingdetails);
// dd($bookCount);
    $comments=Rating::where('user_id','=',Auth::user()->id)->paginate(2);
    $commentCount=count($comments);
    $orderscount=count($orders);
// dd( $bookingdetails);

        return view('pages.profile', [
            'user' => Auth::user(),
            'orders'=>$orders,
            // 'orderdetails' =>$orderdetails,
            'bookingdetails' =>$bookingdetails,
            'comments'      =>$comments,
            'bookCount'     =>$bookCount,
            'commentCount'  => $commentCount,
            'orderscount'   =>$orderscount,
        ]) ;
    }






    public function show($id){
        $user = Auth::user();
        $order = order_detail::find($id);
        $products = DB::table('order_items')
        ->join('order_details', 'order_items.order_details_id', '=', 'order_details.id')
        ->join('services', 'order_items.service_id', '=', 'services.id')
        ->select('order_items.*', 'order_details.*', 'services.*')
        ->where('user_id','=',Auth::user()->id)
        ->where('order_details_id','=',$order->id)
        ->get();
        // dd($products);

        return view('pages.orderDetails', compact('products','order','user')) ->with('i', (request()->input('page',1) - 1) * 2);

          }


    public function edit(User $user)

    {
        $user = Auth::user();
        return view('adminpages.profile', compact('user'));
    }




    public function update(Request $request,$id) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ]);
        $profile = User::find($id);
        $input = $request->all();


        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;


        // $profile->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $profile->update($input);


          return redirect()->route('profile.index')->with('success', 'profile updated successfully');



      }

      public function destroy($id)
      {
          $comment = Rating::where('id',$id)->first();
          $comment->delete();
          return redirect()->route('profile.index')
              ->with('success', 'Rate deleted successfully');
      }

}
