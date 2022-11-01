<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations =['Gaushala','Tinkune','New Road'];
        for($i =0 ; $i<count($locations);$i++){
            DB::table('locations')->insert([
                'address'=>$locations[$i],
                'created_by'=>1
            ]);
        }
    }
}
