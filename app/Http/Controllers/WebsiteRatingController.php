<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteRating;

class WebsiteRatingController extends Controller
{
    public function index()
    {
        $reviews = WebsiteRating::orderBy('id','desc')->paginate(4)->where('status', 'ok');
        return view('pages.index', compact('reviews'));

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
            'comment' => 'required',

        ]);


        $input = $request->all();
        WebsiteRating::create($input);
        return redirect()->back()
        ->with(['success' => 'Thank You For Rating']);

    }

}
