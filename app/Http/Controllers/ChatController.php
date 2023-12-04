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

            $request->validate([
                'message' => 'required|string',
                'room_id' => 'required|exists:rooms,id',
            ]);

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


    public function deleteMessageById(Request $request, $id)
    {
        try {

            $message = Chat::find($id);

            if (!$message) {
                return response()->json([
                    "success" => false,
                    "message" => "Message not found",
                ], Response::HTTP_NOT_FOUND);
            }

            if ($message->user_id !== auth()->id()) {
                return response()->json([
                    "success" => false,
                    "message" => "Unauthorized. You can only delete your own messages.",
                ], Response::HTTP_UNAUTHORIZED);
            }

            $deleteMessage = Chat::destroy($id);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Message deleted",
                    "data" => $deleteMessage
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error deleting Message by id"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
