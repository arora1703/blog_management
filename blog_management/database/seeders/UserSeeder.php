<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
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
        ];
        User::insert($data);
    }
}
