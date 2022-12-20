<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        return view('Admin/Categories',compact('categories'));
    }
    public function AddCategory (Request $request)
    {
        $category=new Category();
        $category->CategoryName=$request->input('Name');
        $category->save();
        return redirect()->back()->with('CatAdded','Category added successfuly!');
    }
    public function DeleteCategory(Request $request)
    {
        $category=Category::where('id','=',$request->input('Id'))->get();
        $category->each->delete();
        return redirect()->back()->with('CatDeleted','Category deleted successfuly!');
    }


}
