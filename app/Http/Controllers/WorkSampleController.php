<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\workSample;
class WorkSampleController extends Controller
{
    public function index()
    {

    $workSamples =WorkSample::all()-> where('worker_id', '=', Auth::user()->id);
    return view('workerdashboard.WorkSampleCrud.WorkSample', compact('workSamples'));
    }


    public function create()
    {

        return view('workerdashboard.WorkSampleCrud.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'worker_id' => 'required|unique:work_samples'
        ],
        [
            'worker_id.unique' => 'You have already added your sample of work ',

        ]

    );
        $input = $request->all();

        if ($image = $request->file('image1')) {
            $destinationPath = 'sampleImages1/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image1'] = "$profileImage";
        }
        if ($image = $request->file('image2')) {
            $destinationPath = 'sampleImages2/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image2'] = "$profileImage";
        }
        if ($image = $request->file('image3')) {
            $destinationPath = 'sampleImages3/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image3'] = "$profileImage";
        }
        if ($image = $request->file('image4')) {
            $destinationPath = 'sampleImages4/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image4'] = "$profileImage";
        }

        WorkSample::create($input);

        return redirect()->route('workSample.index')
            ->with('success', 'photo created successfully.');
    }


    public function edit( $id)
    {
        $workSample = WorkSample::where('id',$id)->first();
        return view('workerdashboard.WorkSampleCrud.edit', compact('workSample'));
    }


    public function update(Request $request,$id)
    {
        $workSample = WorkSample::where('id',$id)->first();
        $input = $request->all();
        if ($image = $request->file('image1')) {
            $destinationPath = 'sampleImages1/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image1'] = "$profileImage";
        } else {
            unset($input['image1']);
        }
        if ($image = $request->file('image2')) {
            $destinationPath = 'sampleImages2/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image2'] = "$profileImage";
        } else {
            unset($input['image2']);
        }
        if ($image = $request->file('image3')) {
            $destinationPath = 'sampleImages3/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image3'] = "$profileImage";
        } else {
            unset($input['image3']);
        }
        if ($image = $request->file('image4')) {
            $destinationPath = 'sampleImages4/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image4'] = "$profileImage";
        } else {
            unset($input['image4']);
        }


        $workSample->update($input);

        return redirect()->route('workSample.index')
            ->with('success', 'photo updated successfully');
    }


    public function destroy($id)
    {
        $workSample = WorkSample::where('id',$id)->first();
        $workSample->delete();
        return redirect()->route('workSample.index')
            ->with('success', 'work Samples deleted successfully');
    }



}
