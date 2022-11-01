<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =['admin','donor'];
        for($i =0 ; $i<count($roles);$i++){
            DB::table('roles')->insert([
                'name'=>$roles[$i],
                'status' => 1,
                'created_by'=>1
            ]);
        }
    }
}
