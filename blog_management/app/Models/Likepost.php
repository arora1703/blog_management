<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likepost extends Model
{
    use HasFactory;
    public function likestatus()
    {
        return $this->belongsTo(Blog::class);
    }
}
