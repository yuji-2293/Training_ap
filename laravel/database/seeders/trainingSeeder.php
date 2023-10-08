<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class trainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trainings')->insert(
            [
                [
                    'name'=>'ベンチプレス',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'name'=>'ラットプルダウン',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                    
                ] ,
                [
                    'name'=>'スクワット',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                    
                    
            ],
            
        );

    }
}
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
