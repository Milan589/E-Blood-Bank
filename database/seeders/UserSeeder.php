<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'id'=> 1,
        //     'name'=> \Illuminate\Support\Str::random(10),
        //     'email'=> \Illuminate\Support\Str::random(50).'@gmail.com',
        //     'phone'=> \Illuminate\Support\Str::random(10),
        //     'password'=> Hash::make('password'),
        //     'created_by'=> 1,

        // ]);
        DB::table('users')->insert([
            'id'=> 1,
            'name'=> 'Milan',
            'email'=> 'milan@gmail.com',
            'phone'=> '9868611452',
            'password'=> Hash::make('milan1234'),  
            'created_by'=> 1, 
        ]);

    }
}
