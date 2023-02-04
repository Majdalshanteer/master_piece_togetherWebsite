<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Http\Request;

class WorkerRatingAdminController extends Controller
{
    public function index(){

     $rating=Rating::paginate(4);
       return view('admindashboard.workerRating', compact('rating'));
    }

}
