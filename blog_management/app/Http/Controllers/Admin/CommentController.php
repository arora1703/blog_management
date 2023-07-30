<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        // $comment_data=Comment::with('blog')->get();

        $comment_data=DB::table('comments')
        ->select('comments.id as comment_id','comments.name','blogs.blog_title','comments.comment_description',
        'categories.category_name','users.id','blogs.user_id','users.name as author')
        ->join('blogs','blogs.blog_id','=','comments.blog_blog_id')
        ->join('users','users.id','=','blogs.user_id')
        ->join('categories','categories.category_id','=','blogs.category_category_id')
        ->get();
        return view('admin.comment.comment_list',compact('comment_data'));
    }
    public function delete_comment($id)
    {
        $comment=Comment::find($id);
        $confirm=$comment->delete();
        if($confirm==true)
        {
            return redirect()->route('comments')->with('success','You have successfully deleted the comment!!');
        }
        else
        {
            return redirect()->route('comments')->with('warning','There must be some error.Please try again!!');
        }
    }
}
