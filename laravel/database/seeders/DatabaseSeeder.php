<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeders\trainingSeeder;
use Illuminate\Database\Seeders\training_partSeeder;
use Illuminate\Support\Facades\DB;



class DatabaseSeeder extends Seeder
{
    private const SEEDERS = [
        training_partSeeder::class,
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([trainingSeeder::class ]);
        foreach(self::SEEDERS as $seeder){
        $this->call($seeder);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
