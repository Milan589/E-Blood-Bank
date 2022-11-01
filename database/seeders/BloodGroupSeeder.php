<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blood_groups =['A+','A-','B+','B-','AB+','AB-','O+','O-'];
        for($i =0 ; $i<count($blood_groups);$i++){
            DB::table('blood_groups')->insert([
                'bg_name'=>$blood_groups[$i],
                'created_by'=>1
            ]);
        }
    }
}
