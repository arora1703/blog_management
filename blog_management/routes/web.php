<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikepostController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('index',[HomeController::class,'logout'])->name('index');

//login & register routes starts
Route::get('admin/signup',[UserController::class,'signup'])->middleware('loggedin');
Route::post('register-user',[UserController::class,'register'])->name('register-user');

Route::get('admin/signin',[UserController::class,'index'])->middleware('loggedin');
Route::post('admin/signin',[UserController::class,'login'])->name('login');
//login & register routes ends


Route::get('blogs',[HomeController::class,'blogs'])->name('blogs');
Route::get('blog_detail/{id}',[HomeController::class,'blog_details'])->name('blog_detail');
Route::post('submit-comment',[CommentController::class,'submit_comment'])->name('submit-comment');
Route::post('like-dislike',[BlogController::class,'like_dislike'])->name('like_dislike');
// Route::get('users',[UserController::class,'index'])->name('users');


//Route for admin panel of blog management
Route::group(['middleware' => ['isloggedin'], 'prefix' => 'admin'], function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('logout',[UserController::class,'logout'])->name('logout');
    //Blog Routes Starts
    Route::get('blogs',[AdminBlogController::class,'bloglist'])->name('bloglist');
    Route::get('add-blog',[AdminBlogController::class,'add_blog'])->name('add-blog');
    Route::post('addblog',[AdminBlogController::class,'addblog'])->name('addblog');
    Route::get('edit_blog/{id}',[AdminBlogController::class,'edit_blog'])->name('edit_blog/{$1}');
    Route::put('update_blog/{id}',[AdminBlogController::class,'update_blog'])->name('update_blog/$1');
    Route::get('delete_blog/{id}',[AdminBlogController::class,'delete_blog'])->name('delete_blog/{$1}');

    //Blog Routes Ends

    //Category Routes Starts
    Route::get('category',[AdminCategoryController::class,'index'])->name('category');
    Route::get('add-category',[AdminCategoryController::class,'add_category'])->name('add-category');
    Route::post('addcategory',[AdminCategoryController::class,'addcategory'])->name('addcategory');
    
    //Category Routes Ends

    //Comment Routes Starts
    Route::get('comments',[AdminCommentController::class,'index'])->name('comments');
    Route::get('delete_comment/{id}',[AdminCommentController::class,'delete_comment'])->name('delete_comment/{id}');
    
    //Comment Routes Ends

    //Search Route starts here
    Route::post('search-blog',[AdminBlogController::class,'search'])->name('search-blog');
    //Search Route endss here
    
});

