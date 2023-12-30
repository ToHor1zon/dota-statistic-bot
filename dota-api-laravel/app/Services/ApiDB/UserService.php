<?php

namespace App\Services\ApiDB;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\NewUserRequest;

use Exception;

class UserService
{
    public static function index()
    {
        try {
            return User::with('players')->get();
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function store(NewUserRequest $req)
    {
        $user = User::make([
            'name' => $req->name,
            'discord_id' => $req->discord_id,
        ]);

        try {
            $user->save();
            
            return response('User ' . $req->name . ' успешно создан', 201);
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
}
