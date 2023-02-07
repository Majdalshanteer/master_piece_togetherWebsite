<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
class UserController extends Controller
{
    public function index(Request $request)
    {


        if($request->filled('search')){
            $users = User ::search($request->search)->where('type', 'User')->get();
        }else{

            $users = User::where('type', 'User')->get();
        }


        // $users = User::all()->where('type', 'User');
        return view('admindashboard.usersCrud.users', compact('users'));

    }

    public function create()
    {
        return view('admindashboard.usersCrud.create');
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

        ]);



        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);


        $user = new User();



        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type'  => $request->type,
            'password' => Hash::make($request->password),
            'image' => $file_name,
           ]);
        return redirect()->route('usersinfo.index')
            ->with('success', 'user created successfully.');
    }


    public function show(User $user)
    {
        return view('admindashboard.usersCrud.show', compact('user'));
    }




    public function edit( $id)
    {
        $user = User::where('id',$id)->first();
        return view('admindashboard.usersCrud.edit', compact('user'));
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

        return redirect()->route('usersinfo.index')
            ->with('success', 'user updated successfully');
    }


    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect()->route('usersinfo.index')
            ->with('success', 'user deleted successfully');
    }




}
