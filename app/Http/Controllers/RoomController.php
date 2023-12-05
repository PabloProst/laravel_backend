<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoomController extends Controller
{
    
    public function newRoom(Request $request)
    {
        try {
            $userId = auth()->id();

            $request->validate([
                'name' => 'required|string',
                'game_id' => 'required|exists:games,id',
            ]);

            $newRoom = Rooms::create(
                [
                    "name" => $request->input('name'),
                    "user_id" => $userId,
                    "game_id" => $request->input('game_id'),
                ]
            );

            return response()->json(
                [
                    "success" => true,
                    "message" => "Room created",
                    "data" => $newRoom
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error creating room"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function deleteRoomById(Request $request, $id)
    {
        try {

            $room = Rooms::find($id);

            if (!$room) {
                return response()->json([
                    "success" => false,
                    "message" => "Room not found",
                ], Response::HTTP_NOT_FOUND);
            }

            if ($room->user_id !== auth()->id()) {
                return response()->json([
                    "success" => false,
                    "message" => "Unauthorized. You can only delete your own rooms.",
                ], Response::HTTP_UNAUTHORIZED);
            }

            $deleteRoom = Rooms::destroy($id);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Room deleted",
                    "data" => $deleteRoom
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error deleting Room by id"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

}
