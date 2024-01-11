<?php

namespace App\Services\ApiDB;

use App\Models\User;
use App\Models\Player;

use App\Services\ApiStratz\PlayerService as StratzApiPlayerService;

use Exception;
use Illuminate\Http\Response;

class UserService
{
    public static function signUp($req): Response
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
                return response('This SteamAccountId is already registered with another DiscordUserId', 409);
            } else {
                return response('You are already registered', 409);
            }
        } else {
            $steamAccountData = StratzApiPlayerService::getSteamAccountData($req->steamAccountId);

            if (!$steamAccountData) {
                return response('Invalid SteamAccountId', 409);
            }

            $player = PlayerService::store([
                'name' => $steamAccountData['name'],
                'id' => $steamAccountData['id'],
                'discord_user_id' => $req->discordUserId,
            ]);

            return response('You are successfully registered', 200);
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
