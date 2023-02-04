<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesCrudController extends Controller
{

    public function index(Request $request)
    {

        if($request->filled('search')){
            $services =Service ::search($request->search)->paginate(100);
        }else{

            $services = Service::paginate(6);
        }



        return view('admindashboard.servicesCrud.services', compact('services'));

    }


    public function edit( $id)
    {
        $service = Service::where('id',$id)->first();
        return view('admindashboard.servicesCrud.edit', compact('service'));
    }


    public function update(Request $request,$id)
    {
        $service = Service::where('id',$id)->first();
        $request->validate([
            'service_name' => 'required',


        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'servicesImages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        if ($image = $request->file('image2')) {
            $destinationPath = 'servicesImages2/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image2'] = "$profileImage";
        } else {
            unset($input['image2']);
        }
        if ($image = $request->file('image3')) {
            $destinationPath = 'servicesImages3/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image3'] = "$profileImage";
        } else {
            unset($input['image3']);
        }
        if ($image = $request->file('image4')) {
            $destinationPath = 'servicesImages4/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image4'] = "$profileImage";
        } else {
            unset($input['image4']);
        }


        $service->update($input);

        return redirect()->route('servicesCrud.index')
            ->with('success', 'service updated successfully');
    }



    public function create()
    {

        return view('admindashboard.servicesCrud.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'category_id' => 'required',


        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'servicesImages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        if ($image = $request->file('image2')) {
            $destinationPath = 'servicesImages2/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image2'] = "$profileImage";
        }
        if ($image = $request->file('image3')) {
            $destinationPath = 'servicesImages3/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image3'] = "$profileImage";
        }
        if ($image = $request->file('image4')) {
            $destinationPath = 'servicesImages4/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image4'] = "$profileImage";
        }

        Service::create($input);

        return redirect()->route('servicesCrud.index')
            ->with('success', 'service created successfully.');
    }







    public function destroy($id)
    {
        $service = Service::where('id',$id)->first();
        $service->delete();
        return redirect()->route('servicesCrud.index')
            ->with('success', 'Service deleted successfully');
    }
}
