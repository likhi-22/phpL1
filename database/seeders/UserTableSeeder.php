<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
        [

            
        [
            'id'=>1,
            'role_id'=>1,
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345'),
            'verified'=>1
        ],
        [
            'id'=>3,
            'role_id'=>2,
            'name'=>'user',
            'email'=>'user1@gmail.com',
            'password'=>Hash::make('123123'),
            'verified'=>1
            ]
        ]
    );
    }
}
