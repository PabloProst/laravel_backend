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
        DB::table('rooms')->insert([
            [
                'name' => 'Sala 1',
                'user_id' => 1,
                'game_id' => 1,
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Sala 2',
                'user_id' => 2,
                'game_id' => 2,
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Sala 3',
                'user_id' => 3,
                'game_id' => 3,
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Sala 4',
                'user_id' => 4,
                'game_id' => 4,
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Sala 5',
                'user_id' => 5,
                'game_id' => 5,
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Sala 6',
                'user_id' => 6,
                'game_id' => 1,
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Sala 7',
                'user_id' => 7,
                'game_id' => 2,
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Sala 8',
                'user_id' => 8,
                'game_id' => 3,
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Sala 9',
                'user_id' => 9,
                'game_id' => 4,
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Sala 10',
                'user_id' => 10,
                'game_id' => 5,
            ],
        ]);
    }
}
