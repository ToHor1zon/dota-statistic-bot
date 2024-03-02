<?php

namespace App\Services\ApiDB;

use App\Models\User;

use Exception;

class UserService
{
    public static function index()
    {
        try {
            return User::with('steamAccounts')->get();
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function store(array $reqParams): User
    {
        $user = User::make([
            'name' => $reqParams['name'],
            'discord_id' => $reqParams['discord_id'],
        ]);

        try {
            $user->save();
            
            return $user;
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
