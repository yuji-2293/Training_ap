<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mymenu_postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mymenu_post')->insert(
            [
                [
                    'name'=>'ベンチプレス',
                    'part_id'=>'1'
                    
                ],

            ],
            
        );
    }
}
