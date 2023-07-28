<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogimage;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blog_data=Blog::with('category','user')->get();
        // dd($blog_data->toArray());
        return view('home',compact('blog_data'));
    }
    public function blogs()
    {
        $blog_data=Blog::with('category','user')->limit(5)->orderBy('blog_id','DESC')->get();
        // dd($blog_data->toArray());
        return view('front.blog_list',compact('blog_data'));
    }
    public function blog_details($id)
    {
        $blog_data=Blog::with('category','user','blogimage')->where('blog_id',$id)->first();
        // dd($blog_data->toArray());
        return view('front.blog_details',compact('blog_data'));
    }
}
