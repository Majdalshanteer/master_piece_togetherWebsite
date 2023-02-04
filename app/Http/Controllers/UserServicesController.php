<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\UserService;
use App\Models\Service;
use App\Models\User;

class UserServicesController extends Controller
{
    public function index()
    {

        $userServices = DB::table('user_services')
        ->join('users', 'user_services.user_id', '=', 'users.id')
        ->join('services', 'user_services.service_id', '=', 'services.id')
        ->select('users.*', 'services.*', 'user_services.*')
        ->paginate(4);

        // dd($userServices);

        // $userServices = UserService::all();

        return view('admindashboard.userServicesCrud.userServices', compact('userServices'));

    }

    public function edit( $id)
    {
        $services = Service::where('type', 'book_unit')->orWhere('type', 'book_hr')->get();
        $workers = User::all()->where('type', 'Worker');
        $userService = UserService::where('id',$id)->first();
        return view('admindashboard.userServicesCrud.edit', compact('userService','services','workers'));
    }


    public function update(Request $request,$id)
    {
        $userService = UserService::where('id',$id)->first();
        $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
        ]);

        $input = $request->all();

        $userService->update($input);

        return redirect()->route('connectService.index')
            ->with('success', 'service to user updated successfully');
    }




    public function create()
    {
        $services = Service::where('type', 'book_unit')->orWhere('type', 'book_hr')->get();
        $workers = User::all()->where('type', 'Worker');
        return view('admindashboard.userServicesCrud.create', compact('services','workers'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',



        ]);

        $input = $request->all();


        UserService::create($input);

        return redirect()->route('connectService.index')
            ->with('success', 'Service to worker created successfully.');
    }

    public function destroy($id)
    {
        $userService = UserService::where('id',$id)->first();
        $userService->delete();
        return redirect()->route('connectService.index')
            ->with('success', 'Service to worker deleted successfully');
    }


}
