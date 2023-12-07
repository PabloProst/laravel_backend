<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_user')->insert([
            'room_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 1,
            'user_id' => 2,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 2,
            'user_id' => 3,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 2,
            'user_id' => 4,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 3,
            'user_id' => 5,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 3,
            'user_id' => 6,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 4,
            'user_id' => 7,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 4,
            'user_id' => 8,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 5,
            'user_id' => 9,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 5,
            'user_id' => 10,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 6,
            'user_id' => 1,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 6,
            'user_id' => 2,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 7,
            'user_id' => 3,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 7,
            'user_id' => 4,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 8,
            'user_id' => 5,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 8,
            'user_id' => 6,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 9,
            'user_id' => 7,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 9,
            'user_id' => 8,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 10,
            'user_id' => 9,
        ]);

        DB::table('room_user')->insert([
            'room_id' => 10,
            'user_id' => 10,
        ]);
    }
}
