<?php

namespace App\Http\Controllers;

use App\Models\order_detail;
use App\Models\order_item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrdersController extends Controller
{
    public function index(){

        // $orders = order_item::all();

        // return view('admindashboard.orderDetails.orders', compact('orders'));

        $order_info = DB::table('order_details')->join('users', 'order_details.user_id', '=', 'users.id')
        ->select('order_details.*', 'users.name')->paginate(6);


    return view('admindashboard.orderDetails.orders', [
        'order_info' => $order_info,

    ]);

    }

    public function edit($id)
    {
        $order = order_detail::find($id);
        $user = User::find($order->user_id);
        // $products = order_item::get()->where('order_details_id','=',$order->id);
        $products = DB::table('order_items')
        ->join('order_details', 'order_items.order_details_id', '=', 'order_details.id')
        ->join('services', 'order_items.service_id', '=', 'services.id')
        ->select('order_items.*', 'order_details.*', 'services.*')
        ->where('order_details_id','=',$order->id)
        ->get();
        return view('admindashboard.orderDetails.edit', [
            'order' => $order,
            'name' => $user->name,
            'products' => $products
        ]);
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $order = order_detail::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('orders.index');
    }




}
