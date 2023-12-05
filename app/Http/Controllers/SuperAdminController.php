<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminController extends Controller
{

    private function validateGameInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:255',
            'image' => 'required|min:3|max:255'
        ]);

        return $validator;
    }

    public function deleteUserById(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "User not found"
                    ],
                    Response::HTTP_NOT_FOUND
                );
            }

            $user->delete();

            return response()->json(
                [
                    "success" => true,
                    "message" => "User deleted"
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error deleting User"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }


    public function createGame(Request $request)
    {
        try {
            $validator = $this->validateGameInfo($request);

            if ($validator->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Error registering game",
                        "error" => $validator->errors()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

            $newGame = Game::create(
                [
                    "title" => $request->input('title'),
                    "image" => $request->input('image'),
                ]
            );

            return response()->json(
                [
                    "success" => true,
                    "message" => "Game created",
                    "data" => $newGame
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error creating game"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function deleteGameById(Request $request, $id)
    {
        try {

            $gameDeleted = Game::destroy($id);

            return response()->json(
                [
                    "success" => true,
                    "message" => "Game deleted",
                    "data" => $gameDeleted
                ],
                Response::HTTP_OK
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error deleting game"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

}