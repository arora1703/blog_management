<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function submit_comment(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'comment_description'=>'required',
            'blog_id'=>'required',
        ]);
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'comment_description'=>$request->comment_description,
            'blog_blog_id'=>$request->blog_id
        ];
        // $comment= new Comment();
        $item = Comment::create($data);
        // $comment->$request->all()->save();
        if($item==true)
        {
            return redirect()->route('blogs')->with('success','Comment has been posted');
        }
        else
        {
            return redirect()->route('blogs')->with('danger','There must be some error!!');
        }

    }
}
