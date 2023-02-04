<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryCrudController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(4);

        return view('admindashboard.categoriesCrud.categories', compact('categories'));

    }


    public function edit( $id)
    {
        $category = Category::where('id',$id)->first();
        return view('admindashboard.categoriesCrud.edit', compact('category'));
    }


    public function update(Request $request,$id)
    {
        $category = Category::where('id',$id)->first();
        $request->validate([
            'name' => 'required',


        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'categoryImages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        if ($image = $request->file('logo')) {
            $destinationPath = 'logoImages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['logo'] = "$profileImage";
        } else {
            unset($input['logo']);
        }

        $category->update($input);

        return redirect()->route('categories.index')
            ->with('success', 'category updated successfully');
    }




    public function create()
    {

        return view('admindashboard.categoriesCrud.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',



        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'categoryImages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        if ($image = $request->file('logo')) {
            $destinationPath = 'logoImages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['logo'] = "$profileImage";
        }

        Category::create($input);

        return redirect()->route('categories.index')
            ->with('success', 'category created successfully.');
    }








    public function destroy($id)
    {
        $category = Category::where('id',$id)->first();
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'category deleted successfully');
    }
}
