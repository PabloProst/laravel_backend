<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Tallie',
            'nickname' => 'tcasillas0',
            'email' => 'tlowerson0@google.nl',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Chandra',
            'nickname' => 'cnewland1',
            'email' => 'cgalland1@skype.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Alanna',
            'nickname' => 'arodmell2',
            'email' => 'abavister2@moonfruit.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Nels',
            'nickname' => 'nfrickey3',
            'email' => 'ngable3@ucoz.ru',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Valene',
            'nickname' => 'vscutter4',
            'email' => 'vlindgren4@latimes.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Derwin',
            'nickname' => 'dbakewell5',
            'email' => 'dmedland5@wordpress.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Glennis',
            'nickname' => 'gbartoszewicz6',
            'email' => 'grosenstengel6@odnoklassniki.ru',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Emlynn',
            'nickname' => 'emulrean7',
            'email' => 'eive7@businessweek.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Corliss',
            'nickname' => 'cbuyers8',
            'email' => 'ceddy8@cargocollective.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Shandra',
            'nickname' => 'sszymon9',
            'email' => 'svynehall9@google.co.jp',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'nickname' => Str::random(10),
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'nickname' => Str::random(10),
            'email' => 'superadmin@superadmin.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin'
        ]);
    }
}
