<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
            'title' => 'Fortnite',
            'image' => 'https://example.com/fortnite.jpg',
        ]);

        DB::table('games')->insert([
            'title' => 'Among Us',
            'image' => 'https://example.com/among-us.jpg',
        ]);

        DB::table('games')->insert([
            'title' => 'Call of Duty: Warzone',
            'image' => 'https://example.com/warzone.jpg',
        ]);

        DB::table('games')->insert([
            'title' => 'Minecraft',
            'image' => 'https://example.com/minecraft.jpg',
        ]);

        DB::table('games')->insert([
            'title' => 'League of Legends',
            'image' => 'https://example.com/league-of-legends.jpg',
        ]);
    }
}
