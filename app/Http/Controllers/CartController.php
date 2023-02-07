<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        if (session()->has('order')) {
            $array = array();
            $ids = array();
            foreach (session()->get('order.services') as $key => $value) {
                array_push($ids,$key);
                $array[$key] = $value;

            }


            $services = DB::table('services')
                ->whereIn('id', $ids)
                ->get();

            $price = 0;
            foreach ($services as $service) {
                $price += $service->price * session('order.services')[$service->id];
            }

            return view('cart', [
                'services' => $services,
                'price' => $price
            ]);
        }else{
            return view('cart',[
                'price' => 0
            ]);
        }


}}
