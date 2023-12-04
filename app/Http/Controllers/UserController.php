<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function getAllUsers(Request $request)
    {
        try {
            $users = User::query()
                ->where('is_active', true)
                ->get(['id','email', 'name', 'nickname', 'is_active']);


            return response()->json(
                [
                    "success" => true,
                    "message" => "Get users successfully",
                    "data" => $users
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error gettin users"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function getUserByIdWithCreateRooms(Request $request, $id) {
        try {
            $user = User::find($id)->rooms;

            return response()->json(
                [
                    "success" => true,
                    "message" => "Get user by id with course successfully",
                    "data" => $user
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error getting user with courses"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function updateUser(Request $request)
    {
        try {
            $accessToken = $request->bearerToken();
            $token = PersonalAccessToken::findToken($accessToken);
            $user = User::query()->find(auth()->user()->id);

            if (!$token) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "User doesnt exists"
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

            $name = $request->input('name');
            $nickname = $request->input('nickname');

            if ($request->has('name')) {
                $user->name = $name;
            }

            if ($request->has('nickname')) {
                $user->nickname = $nickname;
            }

            $user->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "User updated",
                    "data" => $user
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error updating user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
