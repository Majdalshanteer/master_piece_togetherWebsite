<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
class SingleCategoryController extends Controller
{
    public function index()
    {


        $services = Service::all();
        return view('pages.404',compact('services'));


    }
}
