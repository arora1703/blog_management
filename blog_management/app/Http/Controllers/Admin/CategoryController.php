<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin.category.category_list',compact('category'));
    }
    public function add_category()
    {
     return view('admin.category.add_category');
    }
    public function addcategory(Request $request)
    {
        $request->validate([
            'category_name'=>'required'
        ]);
        $category_data=Category::create($request->all());
        if($category_data==true)
        {
            return redirect()->route('category')->with('success','Category Details have been saved!!');
        }
        else
        {
            return redirect()->route('category')->with('warning','There must be some error while saving category!!');
        }
    }
}
