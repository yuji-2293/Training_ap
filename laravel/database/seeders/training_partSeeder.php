<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class training_partSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            ['id' => 1,'name' =>'胸'],
            ['id'=> 2, 'name'=>'背中'],
            ['id'=>3,'name'=>'足'],
            ['id'=>4,'name'=>'腕or肩'],
            ['id'=>5,'name'=>'その他(有酸素等)'],
        ];
        DB::table('training_part')->insert($params);

    }
}
