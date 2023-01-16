<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class WorkersTableAdminController extends Controller
{
    public function index()
    {
        $workers = User::orderBy('id','desc')->paginate(5)->where('type', 'Worker');
        return view('admindashboard.workersCrud.workers', compact('workers'));

    }

    public function create()
    {
        return view('admindashboard.workersCrud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|digits:10',
            'password' => 'required',
            'type' => 'required',

            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        User::create($input);

        return redirect()->route('workersinfo.index')
            ->with('success', 'user created successfully.');
    }


    public function show(User $user)
    {
        return view('admindashboard.workersCrud.show', compact('worker'));
    }




    public function edit( $id)
    {
        $worker = User::where('id',$id)->first();
        return view('admindashboard.workersCrud.edit', compact('worker'));
    }


    public function update(Request $request,$id)
    {
        $user = User::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'type' => 'required',

        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $user->update($input);

        return redirect()->route('workersinfo.index')
            ->with('success', 'user updated successfully');
    }


    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect()->route('workersinfo.index')
            ->with('success', 'user deleted successfully');
    }





}
