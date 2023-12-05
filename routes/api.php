<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomUserController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => [
        'auth:sanctum',
        'is_super_admin'
    ]
], function () {
    Route::get('/users', [SuperAdminController::class, 'getAllUsers']);
    Route::get('/users/{id}', [UserController::class, 'getUserByIdWithCreateRooms']);
    Route::delete('/delete/{id}', [SuperAdminController::class, 'deleteUserById']);
    Route::post('/creategame', [SuperAdminController::class, 'createGame']);
    Route::put('/updategame/{id}', [SuperAdminController::class, 'updateGameById']);
    Route::delete('/deletegame/{id}', [SuperAdminController::class, 'deleteGameById']);
});

Route::group([
    'middleware' => [
        'auth:sanctum'
    ]
], function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/message', [ChatController::class, 'createMessage']);
    Route::delete('/message/delete/{id}', [ChatController::class, 'deleteMessageById']);
    Route::put('/message/update/{id}', [ChatController::class, 'updateMessageById']);
    Route::delete('/deleteroom/{id}', [RoomController::class, 'deleteRoomById']);
    Route::put('/room/update/{id}', [RoomController::class, 'updateRoomById']);
    Route::get('/getallmessages', [ChatController::class, 'getAllMessages']);
    Route::put('/user/update', [userController::class, 'updateUser']);
    Route::post('/newroom', [RoomController::class, 'newRoom']);
    Route::post('/newmember', [RoomUserController::class, 'newMember']);
    Route::delete('/deletemember', [RoomUserController::class, 'deleteMember']);
    Route::get('/getallparties', [RoomUserController::class, 'getAllPartiesById']);
    Route::get('/getallmembers/{id}', [RoomUserController::class, 'getAllMembersById']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/getallgames', [UserController::class, 'getAllGames']);



