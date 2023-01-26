<?php

namespace App\Http\Controllers;
use App\Models\Rating;

use Illuminate\Http\Request;
use App\Models\User;
class WorkersController extends Controller
{
    public function index()
    {
    $workers= User::all()->where('type', 'Worker');

    return view('pages/workers', compact('workers'));


    }
    // public function show(User $worker)
    // {
    //     return view('pages.show', compact('worker'));
    // }

    public function show($id){
        // $avgStar = Rating::avg('rate')->find($id)->where('id',$id)->first();;

        $worker = User::with('ReviewData','serviceSection')->find($id);
        return view('pages.show',compact('worker'));
    }



}
