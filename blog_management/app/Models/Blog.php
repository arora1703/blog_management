<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $primaryKey = 'blog_id';
    protected $fillable=['category_id','blog_title','description','user_id','status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function blogimage()
    {
        return $this->hasMany(Blogimage::class);
    }
    public function likestatus()
    {
        return $this->hasMany(Likepost::class,'blog_blog_id','blog_id');
    }
    
}
