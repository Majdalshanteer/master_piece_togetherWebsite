<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\order_detail;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = order_detail::where('user_id','=',Auth::user()->id)->get();

        return view('pages.profile', [
            'user' => Auth::user(),
            'orders'=>$orders
        ]);



    }
    public function edit(User $user)

    {
        $user = Auth::user();
        return view('adminpages.profile', compact('user'));
    }




    public function update(Request $request,$id) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ]);
        $profile = User::find($id);
        $input = $request->all();


        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;


        // $profile->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $profile->update($input);






          return redirect()->route('profile.index')->with('success', 'profile updated successfully');



      }
}
