<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Likepost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs=Blog::with(['user'])->first();
        dd($blogs->toArray(0));
    }
    public function like_dislike(Request $request)
    {

        $likepost_data=Likepost::where('blog_blog_id',$request->blog_blog_id)->where('user_id',$request->user_id)->first();
        // dd($likepost_data);
        if($likepost_data==null)
        {
            $likedislike= new Likepost();
            $likedislike->blog_blog_id=$request->blog_blog_id;
            $likedislike->user_id=$request->user_id;
            $likedislike->like_status=$request->like_status;
            $likepost=$likedislike->save();
            if($likepost==true)
            {
                return json_encode(array(
                    "statusCode"=>200
                ));
            }
        }
        else
        {
            $likepost_data->like_status=$request->like_status;
            $likepost=$likepost_data->update();
            if($likepost==true)
            {
                return json_encode(array(
                    "statusCode"=>200
                ));
            }
        }


    }

}
