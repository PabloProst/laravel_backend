<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('rooms')->insert([
                'name' => 'Sala ' . $i,
                'user_id' => rand(1, 10),
                'game_id' => rand(1, 5),
            ]);
        }
    }
}
