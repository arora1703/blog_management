<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'name' => 'Test User',
            'username' => 'test2707',
            'email' => 'test@example.com',
            'password'=>Hash::make('123456'),
        ]);
        Blog::create([
            'blog_title' => 'Test blog',
            'category_category_id'=>1,
            'blog_title' => 'title',
            'blog_header_image'=>rand(5,10).'.jpg',
            'description'=>'This is text line',
            'user_id'=>1,
            'status'=>1
                ]);
        Category::create(
            ['category_name'=>'Software','status'=>1],
            ['category_name'=>'Telecom','status'=>1],
            ['category_name'=>'Infrastructure','status'=>1],
            ['category_name'=>'Hospitality','status'=>1],
            ['category_name'=>'Government','status'=>1]
        );

    }
}
