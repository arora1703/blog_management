<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
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
            'blog_header_image'=>rand(5,10).'.jpg',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ],
            [
            'blog_title' => Str::random(10),
            'category_category_id'=>random_int(1,5),
            'blog_header_image'=>rand(5,10).'.jpg',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ],
            [
            'blog_title' => Str::random(10),
            'category_category_id'=>random_int(1,5),
            'blog_header_image'=>rand(5,10).'.jpg',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ],
            [
            'blog_title' => Str::random(10),
            'category_category_id'=>random_int(1,5),
            'blog_header_image'=>rand(5,10).'.jpg',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ],
            [
            'blog_title' => Str::random(10),
            'category_category_id'=>random_int(1,5),
            'blog_header_image'=>rand(5,10).'.jpg',
            'description'=>Str::random(30),
            'user_id'=>random_int(1,3),
            'status'=>1
            ]);

    }
}
