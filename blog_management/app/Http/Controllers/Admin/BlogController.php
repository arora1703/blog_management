<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blogimage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function bloglist()
    {
        $blogdata= Blog::with('category','user')->get();
        // dd($blogdata->toArray());
        return view('admin.blog.blog_detail',compact('blogdata'));
    }
    
    public function add_blog()
    {
        $category=Category::all();
        return view('admin.blog.add_blog',compact('category'));
    }
    public function addblog(Request $request)
    {
        $request->validate([
            'blog_title'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'blog_header_image'=>'required|mimes:png,jpg,jpeg|max:512',
            'status'=>'required',
            'images.*'=>'required|mimes:png,jpg,jpeg|max:512',
        ]);
        $blog_data= new Blog();
        $blog_data->blog_title=$request->input('blog_title');
        $blog_data->category_category_id=$request->input('category_id');
        $blog_data->description=$request->input('description');
        $blog_data->status=$request->input('status');
        $blog_data->user_id=$request->session()->get('user_id'); 
        if($request->hasFile('blog_header_image'))
        {
        $destinationPath = 'uploads/header_images';
        $image = $request->file('blog_header_image');
        $header_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $header_image);
        $blog_data->blog_header_image=$header_image;
        }
        $blog_data->save();
        $blog_id= $blog_data->blog_id;
        // dd($blog_id);
        
        if($request->hasFile('images'))
        {
            $i=1;
            foreach($request->images as $image)
            {
            $blog_image_data= new Blogimage();
            $destinationPath = 'uploads/blog_images';
            // $image = $request->file('images');
            $blog_image = date('YmdHis') .$i++. "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $blog_image);
            $blog_image_data->image_deatils=$blog_image;
            $blog_image_data->blog_blog_id=$blog_id;
            $blog_image_data->status=1;
            $blog_image_data->save();
            } 
            
            
        }
        return redirect('admin/blogs')->with('success','Blog Details has been added');


    }
    public function edit_blog($id)
    {
        $blog_data=Blog::with('category','blogimage')->findOrFail($id);
        $category=Category::all();
        return view('admin.blog.edit_blog',compact('blog_data','category'));
    }
    public function update_blog(Request $request,$id)
    {
        $blog_data=Blog::with('blogimage')->find($id);
        // dd($blog_data->image_deatils);
        $request->validate([
            'blog_title'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'blog_header_image'=>'mimes:png,jpg,jpeg|max:512',
            'status'=>'required',
            'images.*'=>'mimes:png,jpg,jpeg|max:512',
        ]);
        $blog_data->blog_title=$request->blog_title;
        $blog_data->category_category_id=$request->category_id;
        $blog_data->description=$request->description;
        $blog_data->status=$request->status;
        if($request->hasFile('blog_header_image')) 
        {        
        $oldfile = 'uploads/header_images/'.$blog_data->blog_header_image; 
        if(File::exists($oldfile))
        {
        File::delete($oldfile);
        }
        $destinationPath = 'uploads/header_images';
        $image = $request->file('blog_header_image');
        $header_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $header_image);
        $blog_data->blog_header_image=$header_image; 
        }
        $update=$blog_data->update();
        if($update==true)
        {
            return redirect()->route('bloglist')->with('success','Blog Details has been updated.');
        }
        else
        {
            return redirect()->route('bloglist')->with('warning','There must be some error!!');

        }
    }
    
}
