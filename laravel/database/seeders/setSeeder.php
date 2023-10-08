<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class setSeeder extends Seeder{
    public function run(): void{
        
            DB::table('sets')->insert(
            [
                'training_id'=>1,
                'w-1set'=>1,
                'w-2set'=>1,
                'w-3set'=>1,
                'r-1set'=>1,
                'r-2set'=>1,
                'r-3set'=>1,

            ],
        );
    }

}