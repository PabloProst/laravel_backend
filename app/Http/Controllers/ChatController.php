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
            $accessToken = $request->bearerToken();
            $token = PersonalAccessToken::findToken($accessToken);
            $user = auth()->id();
            $member_room = RoomUser::query()->where('user_id', $user)->get();
            print_r($member_room);
            $message = $request->input('message');

            if (!$token) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "User doesnt exists"
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

            if($member_room > 1){
                $newMessage = Chat::create([
                    'message' => $message,
                    'user_id' => $user,
                ]);
            }

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
