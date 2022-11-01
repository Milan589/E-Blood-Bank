<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodBankTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blood_bank_types =['Red Cross Society','Kantipur Society','Trama Society'];
        for($i =0 ; $i<count($blood_bank_types);$i++){
            DB::table('blood_bank_types')->insert([
                'bank_name'=>$blood_bank_types[$i],
                'created_by'=>1
            ]);
        }
    }
}
