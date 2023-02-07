<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeleteFromCartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if (count(session()->get('order.services'))>1) {
            session()->forget("order.services.$request->service_id");
        }else{
            session()->forget("order");
        }

        return back()->withSuccess('Product has been deleted');
    }
}
