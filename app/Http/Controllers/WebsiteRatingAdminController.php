<?php

namespace App\Http\Controllers;
use App\Models\WebsiteRating;
use Illuminate\Http\Request;

class WebsiteRatingAdminController extends Controller
{
    public function index()
    {
        $reviews = WebsiteRating::paginate(5);

        return view('admindashboard.websiteRatingCrud.websiteRating', compact('reviews'));

    }
    public function edit( $id)
    {
        $review = WebsiteRating::where('id',$id)->first();
        return view('admindashboard.websiteRatingCrud.edit', compact('review'));
    }


    public function update(Request $request,$id)
    {
        $review = WebsiteRating::where('id',$id)->first();
        $request->validate([
            'status' => 'required',

        ]);

        $input = $request->all();
        $review->update($input);

        return redirect()->route('WebsiteRating.index')
            ->with('success', 'review updated successfully');
    }


    public function destroy($id)
    {
        $review = WebsiteRating::where('id',$id)->first();
        $review->delete();
        return redirect()->back()
            ->with('success', 'Rate deleted successfully');
    }




}
