<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.service', compact('categories'));

    }


    public function show(Request $request,$id)
    {

        if($request->filled('search')){

            $categories = Category::find($id);
            $services = Service::search($request->search)->get()->where('category_id', '=', $categories->id);
            $workers = UserService::all();
            $users = User::all();
        }else{

            $categories = Category::find($id);
            $services = Service::where('category_id', '=', $categories->id)->paginate(4);
            $workers = UserService::all();
            $users = User::all();
        }


        return view('pages/servicesInsideCat', [
            'category' => $categories,
            'services' => $services,
            'workers'  => $workers,

        ]);
    }







    public function workersName(Service $service) {
        $service=Service::with('users')->find($service->id);

        $users=User::all();

        return view('pages/servicesInsideCat',compact('service','users',)); }




}
