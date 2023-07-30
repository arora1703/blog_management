<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Likepost;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $blog_count=Blog::count();
        $user_count=User::count();
        $comment_count=Comment::count();
        $like_count=Likepost::groupBy('like_status')->orderBy('like_status','desc')->selectRaw('count(*) as total, like_status')->get();
        return view('admin.dashboard',compact('blog_count','user_count','comment_count','like_count'));
    }
}
