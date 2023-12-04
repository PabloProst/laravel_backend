<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\RoomUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends Controller
{
    public function createMessage(Request $request)
    {
        Log::info('Create Message');
        try {
            $userId = auth()->id();

            $newMessage = Chat::create(
                [
                    "message" => $request->input('message'),
                    "user_id" => $userId,
                    "room_id" => $request->input('room_id'),
                ]
                );

                return response()->json(
                    [
                        "success" => true,
                        "message" => "Message sent"
                    ],
                    Response::HTTP_ACCEPTED
                );
       
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error creating message"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
