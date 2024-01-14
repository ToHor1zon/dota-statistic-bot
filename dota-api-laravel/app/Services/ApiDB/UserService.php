<?php

namespace App\Services\ApiDB;

use App\Models\User;
use App\Models\Player;

use App\Services\ApiStratz\PlayerService as StratzApiPlayerService;

use Exception;
use Illuminate\Http\JsonResponse;

class UserService
{
    public static function signUp($req): JsonResponse
    {
        $isExistsUser = User::where('id', $req->discordUserId)->exists();
        $isExistsPlayer = Player::where('id', $req->steamAccountId)->exists();

        if (!$isExistsUser) {
            self::store([
                'name' => $req->discordUserName,
                'discord_id' => $req->discordUserId
            ]);
        }

        if ($isExistsPlayer) {
            $player = Player::where('id', $req->steamAccountId)->with(['user'])->get();

            if($player->pluck('user')[0]->discord_id !== $req->discordUserId) {
                return response()->json([
                    'message' => 'This SteamAccountId is already registered with another DiscordUserId'
                ], 409);
            } else {
                return response()->json([
                    'message' => 'You are already registered'
                ], 409);
            }
        } else {
            $steamAccountData = StratzApiPlayerService::getSteamAccountData($req->steamAccountId);

            if (!$steamAccountData) {
                return response()->json([
                    'message' => 'Invalid SteamAccountId'
                ], 409);
            }

            $player = PlayerService::store([
                'name' => $steamAccountData['name'],
                'id' => $steamAccountData['id'],
                'discord_user_id' => $req->discordUserId,
            ]);

            return response()->json([
                'message' => 'You are successfully registered'
            ], 201);
        }
    }

    public static function index()
    {
        try {
            return User::with('players')->get();
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function store(array $reqParams)
    {
        $user = User::make([
            'name' => $reqParams['name'],
            'discord_id' => $reqParams['discord_id'],
        ]);

        try {
            $user->save();
            
            return response('User ' . $reqParams['name'] . ' успешно создан', 201);
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function show(string $discordId)
    {
        try {
            return User::where('discord_id', $discordId)->first();
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function destroy(string $discordId)
    {
        try {
            return User::where('discord_id', $discordId)->delete();
        } catch (Exception $e) {
            return $e;
        }
    }
}
