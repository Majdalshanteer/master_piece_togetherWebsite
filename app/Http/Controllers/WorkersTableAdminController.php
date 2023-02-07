<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class WorkersTableAdminController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('search')){

            $workers = User::search($request->search)->where('type', 'Worker')->paginate(100);
            $services = Service::all()->where('type', 'book_unit');
        }else{
            $workers = User::where('type', 'Worker')->paginate(4);
        $services = Service::all()->where('type', 'book_unit');

        }

        return view('admindashboard.workersCrud.workers', compact('workers','services'));

    }

    public function create()
    {
        $services = Service::where('type', 'book_unit')->orWhere('type', 'book_hr')->get();
        return view('admindashboard.workersCrud.create', compact('services'));
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
        'phone' => 'required',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',

    ]);

    $file_name = time() . '.' . request()->image->getClientOriginalExtension();
    request()->image->move(public_path('images'), $file_name);


    $user = new User();

    $id = DB::table('users')->insertGetId(
        [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'type'=>$request->type,
            'image' => $file_name,
            'password' => Hash::make($request->password),

        ]
    );
    DB::table('user_services')->insert([
        [
          'user_id' => $id,
          'service_id'=>$request->service_id
        ]
    ]);


        return redirect()->route('workersinfo.index')
            ->with('success', 'worker created successfully.');
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
            ->with('success', 'worker deleted successfully');
    }





}
