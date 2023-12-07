<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chats')->insert([
            'message' => 'Hola, ¿cómo están?',
            'user_id' => 1,
            'room_id' => 1,
        ]);

        DB::table('chats')->insert([
            'message' => 'Todo bien por acá, gracias.',
            'user_id' => 2,
            'room_id' => 1,
        ]);

        DB::table('chats')->insert([
            'message' => '¡Saludos a todos en la sala 2!',
            'user_id' => 3,
            'room_id' => 2,
        ]);

        DB::table('chats')->insert([
            'message' => '¿Cómo va todo por allá?',
            'user_id' => 4,
            'room_id' => 2,
        ]);

        DB::table('chats')->insert([
            'message' => '¡Bienvenidos a la sala 3!',
            'user_id' => 5,
            'room_id' => 3,
        ]);

        DB::table('chats')->insert([
            'message' => '¿Alguien tiene alguna sugerencia para jugar?',
            'user_id' => 6,
            'room_id' => 3,
        ]);

        DB::table('chats')->insert([
            'message' => '¡Hola a todos en la sala 4!',
            'user_id' => 7,
            'room_id' => 4,
        ]);

        DB::table('chats')->insert([
            'message' => '¿Alguien quiere unirse a mi equipo?',
            'user_id' => 8,
            'room_id' => 4,
        ]);

        DB::table('chats')->insert([
            'message' => 'Saludos desde la sala 5.',
            'user_id' => 9,
            'room_id' => 5,
        ]);

        DB::table('chats')->insert([
            'message' => '¿Alguien más juega League of Legends?',
            'user_id' => 10,
            'room_id' => 5,
        ]);

        DB::table('chats')->insert([
            'message' => '¿Cómo va la tarde en la sala 6?',
            'user_id' => 1,
            'room_id' => 6,
        ]);

        DB::table('chats')->insert([
            'message' => 'Todo tranquilo por aquí.',
            'user_id' => 2,
            'room_id' => 6,
        ]);

        DB::table('chats')->insert([
            'message' => '¡Hola a todos en la sala 7!',
            'user_id' => 3,
            'room_id' => 7,
        ]);

        DB::table('chats')->insert([
            'message' => '¿Algún juego interesante para recomendar?',
            'user_id' => 4,
            'room_id' => 7,
        ]);

        DB::table('chats')->insert([
            'message' => 'Saludos desde la sala 8.',
            'user_id' => 5,
            'room_id' => 8,
        ]);

        DB::table('chats')->insert([
            'message' => '¿Alguien más disfruta de los juegos retro?',
            'user_id' => 6,
            'room_id' => 8,
        ]);

        DB::table('chats')->insert([
            'message' => '¡Hola a todos en la sala 9!',
            'user_id' => 7,
            'room_id' => 9,
        ]);

        DB::table('chats')->insert([
            'message' => '¿Alguien quiere unirse a una partida de Among Us?',
            'user_id' => 8,
            'room_id' => 9,
        ]);

        DB::table('chats')->insert([
            'message' => 'Saludos desde la sala 10.',
            'user_id' => 9,
            'room_id' => 10,
        ]);

        DB::table('chats')->insert([
            'message' => '¿Alguien más juega Minecraft?',
            'user_id' => 10,
            'room_id' => 10,
        ]);
    }
}
