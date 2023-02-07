<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddToCartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $service = Service::find($request->serviceId);
        $quantity = $request->quantity;


        if (session()->has('order')) {

                session()->put("order.services.$service->id", $quantity);
                return Redirect::back()->withSuccess('Cart has been updated');


        } else {
            $order = [
                'services' => [
                    $service->id => $quantity
                ]
            ];

            // dd($order);
            session()->put('order', $order);
            return Redirect::back()->withSuccess('Product has been added');
        }



    }
}
