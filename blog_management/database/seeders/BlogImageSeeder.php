<?php

namespace Database\Seeders;

use App\Models\Blogimage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'1.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'2.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'3.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'4.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'5.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'6.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'7.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'8.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'9.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'10.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'11.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'12.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'13.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'14.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'15.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'16.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'17.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'18.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'19.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'20.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'21.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'22.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'23.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'24.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'25.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'26.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'27.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'28.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'29.jpg','status'=>1],
            ['blog_blog_id'=>random_int(1,5),'image_deatils'=>'30.jpg','status'=>1],
            ];
            Blogimage::insert($data);
    }
}
