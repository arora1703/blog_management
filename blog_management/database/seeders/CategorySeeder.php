<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['category_name'=>'Software','status'=>1],
            ['category_name'=>'Telecom','status'=>1],
            ['category_name'=>'Infrastructure','status'=>1],
            ['category_name'=>'Hospitality','status'=>1],
            ['category_name'=>'Government','status'=>1]
            ];
            Category::insert($data);
    }
}
