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
    public function createMessage(Request $request) {
        Log::info('Create Message');
        try {
            $accessToken = $request->bearerToken();
            $token = PersonalAccessToken::findToken($accessToken);
            $user = auth()->user();
            $member_room = $user->userMembers;
            $message = $request->input('message');

            if (!$token) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "User doesn't exist"
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

            // if ($member_room) {
            //     $newMessage = $user->userChats()->create([
            //         'message' => $message,
            //     ]);
            //     $member_room->chats()->attach($newMessage->id);
            // }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Message created",
                    "data" => $newMessage
                ],
                Response::HTTP_CREATED
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

        return 'Create message';
    }
}
