<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogimage extends Model
{
    use HasFactory;
    public function blogimage()
    {
        return $this->belongsTo(Blog::class,'blog_blog_id','blog_id');
    }
}
