<?php

namespace App\Http\Controllers;

use App\Models\RoomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoomUserController extends Controller
{
    public function newMember(Request $request)
    {
        try {
            $userId = auth()->id();

            $newRoom = RoomUser::create(
                [
                    "user_id" => $userId,
                    "room_id" => $request->input('room_id'),
                ]
            );

            return response()->json(
                [
                    "success" => true,
                    "message" => "Member added",
                    "data" => $newRoom
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error member cannot added"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function deleteMember(Request $request)
    {
        try {
            $userId = auth()->id();

            $delMember = RoomUser::where([
                "user_id" => $userId,
                "room_id" => $request->input('room_id'),
            ])->delete();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Member deleted",
                    "data" => $delMember
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error member cannot be deleted"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getAllPartiesById(Request $request)
    {
        try {
            $userId = auth()->id();

            $userParties = RoomUser::where('user_id', $userId)->get();

            return response()->json(
                [
                    "success" => true,
                    "message" => "All parties by member",
                    "data" => $userParties
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error parties cannot retrived"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getAllMembersById(Request $request, $id)
    {
        try {
            $userId = auth()->id();
            
            




        } catch (\Throwable $th) {
            
        }
    }
}
