<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TopRatedController extends Controller
{

    //not active code moved to websiteRatingController

    public function index()
    {
        $topFiveWorkers = DB::table('users')
        ->select('users.*', DB::raw('AVG(ratings.rate) as avg_rating'))
        ->join('ratings', 'users.id', '=', 'ratings.worker_id')
        ->groupBy('ratings.worker_id')
        ->orderBy('avg_rating', 'desc')
        ->take(5)
        ->get();

    return view('pages.testtoprated', compact('topFiveWorkers'));
}




}
