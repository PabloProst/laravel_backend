<?php

namespace App\Http\Controllers;

use App\Models\RoomUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

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

            $room = RoomUser::where('room_id', $id)->get(['user_id']);
            $roomMembers = User::whereIn('id', $room)->get(['nickname']);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Members",
                    "data" => $roomMembers
                ],
                Response::HTTP_OK

            );
        }

         catch (\Throwable $th) {
             Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error getting members"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        }
    }
