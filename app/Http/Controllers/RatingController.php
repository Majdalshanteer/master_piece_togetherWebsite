<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
//     public function index(){

//   $rates = DB::table('ratings')->where('worker_id',1)->avg('rate');
//     return view('pages.show', [
//         'rates' => $rates
//     ]);

//     }

public function index()
{
    $rates = Rating::all();
    return view('pages.show', compact('rates'));
    // $ratings = Rating::where('worker_id','=',$request->worker_id)->get();

    // return view('pages.show', [
    // //    ' worker_id' =$request->worker_id
    //     'ratings'=>$ratings
    // ]);
}

    public function create(Request $request,$worker_id)
    {
        $user_id = Auth::user()->id;


        Rating::create($request->all());

        return redirect()->back()
                         ->with(['success' => 'Thank you, for rating .']);

        $rating = new Rating;
        $rating->$user = Auth::user()->id;
        $rating->rate = $request->$rate;
        $rating->worker_id =$request->worker_id ;

        $rating->save();

        return response()->json(['success' => 'rating successfully!']);
    }


    // $avgStar = Rating::avg('rate');
}
