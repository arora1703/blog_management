<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin.category.category_list',compact('category'));
    }
}
