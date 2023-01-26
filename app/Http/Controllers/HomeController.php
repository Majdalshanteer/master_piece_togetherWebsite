<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->type;
        // $allUsers = User::get()->where('role', 'user');
        // $allProducts = Product::all()->count();
             if($user == 'Driver'){
            return  view('pages.team');
        }else if ($user == 'Admin') {
            return view('admindashboard.index', [
                'user'=>$user
            ]);
        } else if($user == 'Worker'){
            return  view('workerdashboard.index', [
                'user'=>$user
            ]);}

        else{
            return redirect('/');
        }
    }
}
