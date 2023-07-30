<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blogimage;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Likepost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SebastianBergmann\Type\NullType;
use Symfony\Component\Console\Input\Input;

class BlogController extends Controller
{
    
    public function bloglist()
    {
        $blogdata= Blog::with('category','user')->get();
        $category=Category::all();
        $user=User::all();
        // dd($blogdata->toArray());
        return view('admin.blog.blog_detail',compact('blogdata','category','user'));
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
    public function search(Request $request)
    {
        if(($request->search=='search')&&($request->blog_title==NULL)&&($request->user_id==NULL)&&($request->category_id==NULL))
        {
            return redirect()->route('bloglist')->with('warning','Please select atleast one option to get Blog Data!!');
        }
        if($request->search=='search')
        {
            $category=Category::all();
            $user=User::all();
            //only blog title details
            if($request->input('blog_title'))
            {
            $blogdata= Blog::with('category','user','blogimage')
            ->where('blog_title', 'like', '%' .$request->input('blog_title'). '%')
            ->get();
            }
            //only user details
            if($request->input('user_id'))
            {
            $blogdata= Blog::with('category','user','blogimage')
            ->where('blogs.user_id',$request->input('user_id'))
            ->get();
            }
            //only category details
            if($request->input('category_id'))
            {
            $blogdata= Blog::with('category','user','blogimage')
            ->where('blogs.category_category_id',$request->input('category_id'))
            ->get();
            }
            //only blog title & user details
            if($request->input('blog_title')&&$request->input('user_id'))
            {
            $blogdata= Blog::with('category','user','blogimage')
            ->where('blog_title', 'like', '%' .$request->input('blog_title'). '%')
            ->where('blogs.user_id',$request->input('user_id'))
            ->get();
            }
            //only blog title & category details
            if($request->input('blog_title')&&$request->input('category_id'))
            {
            $blogdata= Blog::with('category','user','blogimage')
            ->where('blog_title', 'like', '%' .$request->input('blog_title'). '%')
            ->where('blogs.category_category_id',$request->input('category_id'))
            ->get();
            }
            //only blog title & user details
            if($request->input('category_id')&&$request->input('user_id'))
            {
            $blogdata= Blog::with('category','user','blogimage')
            ->where('blogs.category_category_id',$request->input('category_id'))
            ->where('blogs.user_id',$request->input('user_id'))
            ->get();
            }
            //for all three type data
            if($request->input('blog_title')&&$request->input('category_id')&&$request->input('user_id'))
            {
            $blogdata= Blog::with('category','user','blogimage')
            ->where('blog_title', 'like', '%' .$request->input('blog_title'). '%')
            ->where('blogs.category_category_id',$request->input('category_id'))
            ->where('blogs.user_id',$request->input('user_id'))
            ->get();
            }
            return view('admin.blog.blog_detail',compact('blogdata','category','user'));

        }
        elseif($request->search=='reset')
        {
            return redirect()->route('bloglist');
        }
    }

    public function delete_blog($id)
    {
        $blog_data=Blog::find($id);
        $comment_data=Comment::where('blog_blog_id',$id)->get();
        // dd($comment_data->toArray());
        if($comment_data)
        {
            $comment_data->each->delete();
        }
        $blog_image=Blogimage::where('blog_blog_id',$id)->get(); 
        if($blog_image)
        {
            $blog_image->each->delete();
        }
        $liked_post=Likepost::where('blog_blog_id',$id)->where('user_id',$blog_data->user_id)->get();
        if($liked_post)
        {
            $liked_post->each->delete();
        }
        $confirmdelete=$blog_data->delete();
        if($confirmdelete==true)
        {
            return redirect()->route('bloglist')->with('success','You have successfully deleted the blog!!');
        }
        else
        {
            return redirect()->route('bloglist')->with('warning','There must be some error.Please try again!!');

        }

    }
}
