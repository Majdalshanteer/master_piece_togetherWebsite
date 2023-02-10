<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\workSample;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserService;
class WorkersController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('search')){
            $workers = User ::search($request->search)->get()->where('type', 'Worker');
            $comments=Rating::all();

        }else{

  $workers= User::where('type', 'Worker')->paginate(8);
  $comments=Rating::all();
        }

    return view('pages/workers', compact('workers'));


    }


    public function show($id){
        // $avgStar = Rating::avg('rate')->find($id)->where('id',$id)->first();;
        $workSamples =WorkSample::all()->where('worker_id', '=', $id);
        $comments=Rating::where('worker_id', $id)->paginate(2);

        $average = DB::table('ratings')
            ->where('worker_id', $id)
            ->avg('rate');
        $worker = User::with('ReviewData','serviceSection')->find($id);
        // dd( $average);
        return view('pages.show',compact('worker','workSamples','average','comments'));
    }

    public function destroy($id)
      {
          $comment = Rating::where('id',$id)->first();
          $comment->delete();
          return redirect()->back()
              ->with('success', 'Rate deleted successfully');
      }

}
