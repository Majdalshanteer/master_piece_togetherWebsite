<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileWorkerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('workerdashboard.index', [
            'user' => Auth::user(),

        ]);
    }
    public function edit(User $user)

    {
        $user = Auth::user();
        return view('workerdashboard.index', compact('user'));
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
        return redirect()->back()
        ->with(['success' => 'Thank you, profile updated successfully .']);



      }
}
