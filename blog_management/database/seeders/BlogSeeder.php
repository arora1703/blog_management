<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'blog_title' => Str::random(10),
                'category_category_id'=>random_int(1,5),
                'blog_header_image'=>'20230727194141.jpg',
                'description'=>Str::random(30),
                'user_id'=>random_int(1,3),
                'status'=>1
                ],
                [
                'blog_title' => Str::random(10),
                'category_category_id'=>random_int(1,5),
                'blog_header_image'=>'20230727194948.jpg',
                'description'=>Str::random(30),
                'user_id'=>random_int(1,3),
                'status'=>1
                ],
                [
                'blog_title' => Str::random(10),
                'category_category_id'=>random_int(1,5),
                'blog_header_image'=>'20230727194948.jpg',
                'description'=>Str::random(30),
                'user_id'=>random_int(1,3),
                'status'=>1
                ],
                [
                'blog_title' => Str::random(10),
                'category_category_id'=>random_int(1,5),
                'blog_header_image'=>'20230728174441.jpg',
                'description'=>Str::random(30),
                'user_id'=>random_int(1,3),
                'status'=>1
                ],
                [
                'blog_title' => Str::random(10),
                'category_category_id'=>random_int(1,5),
                'blog_header_image'=>'20230728160216.png',
                'description'=>Str::random(30),
                'user_id'=>random_int(1,3),
                'status'=>1
                ]
            ];
            Blog::insert($data);
    }
}
