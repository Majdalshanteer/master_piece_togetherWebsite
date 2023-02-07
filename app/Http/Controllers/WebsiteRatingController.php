<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\WebsiteRating;

class WebsiteRatingController extends Controller
{
    public function index()
    {
        $reviews = WebsiteRating::paginate(3)->where('status', 'ok');


        // top five workers
        $topFiveWorkers = DB::table('users')
        ->select('users.*', DB::raw('AVG(ratings.rate) as avg_rating'))
        ->join('ratings', 'users.id', '=', 'ratings.worker_id')
        ->groupBy('ratings.worker_id')
        ->orderBy('avg_rating', 'desc')
        ->take(5)
        ->get();


        return view('pages.index', compact('reviews','topFiveWorkers'));



    }

    public function create()
    {
        return view('pages.index');
    }

    public function store(Request $request)
    {
        $request->validate([
//    'user_id' => 'required|unique:website_ratings,comment',
            'user_id' => 'required|unique:website_ratings',
            'rate' => 'required|integer|between:1,5',
            'comment' => 'required'],
            [
                'user_id.unique' => 'You have already rated',

            ]
        );


        $input = $request->all();
        WebsiteRating::create($input);
        return redirect()->back()
        ->with(['success' => 'Thank You For Rating']);

    }

}
