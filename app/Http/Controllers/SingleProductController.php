<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class SingleProductController extends Controller
{
    public function show($id){
        $service =Service::find($id);
        return view('pages/singleProduct',compact('service'));
    }
}
