<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Blogimage;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create(
            [
            'name' => 'Abhimanyu Arora',
            'username' => 'abhi1703',
            'email' => 'abhi1703@example.com',
            'password'=>Hash::make('123456'),
            ],
            [
                'name' => 'Bruce',
                'username' => 'bruce1234',
                'email' => 'bruce@example.com',
                'password'=>Hash::make('123456'),
            ],
            [
                'name' => 'Mark',
                'username' => 'mark1212',
                'email' => 'mark@example.com',
                'password'=>Hash::make('123456'),
            ]
        );
        Category::create(
            ['category_name'=>'Software','status'=>1],
            ['category_name'=>'Telecom','status'=>1],
            ['category_name'=>'Infrastructure','status'=>1],
            ['category_name'=>'Hospitality','status'=>1],
            ['category_name'=>'Government','status'=>1]
        );
        Blog::create(
            [
            'blog_title' => Str::random(10),
            'category_category_id'=>random_int(1,5),
            'blog_header_image'=>'202307271613101.jpg',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ],
            [
            'blog_title' => Str::random(10),
            'category_category_id'=>'202307271613102.jpg',
            'blog_header_image'=>rand(5,10).'.jpg',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ],
            [
            'blog_title' => Str::random(10),
            'category_category_id'=>random_int(1,5),
            'blog_header_image'=>'202307271613103.jpg',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ],
            [
            'blog_title' => Str::random(10),
            'category_category_id'=>random_int(1,5),
            'blog_header_image'=>'202307281602161.png',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ],
            [
            'blog_title' => Str::random(10),
            'category_category_id'=>random_int(1,5),
            'blog_header_image'=>'202307281602163.png',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ]);

        Blogimage::create(
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
            );

    }
}
