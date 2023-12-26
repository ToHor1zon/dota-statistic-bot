<?php

namespace App\Services\ApiDB;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\NewUserRequest;

use Exception;

class UserService
{
    public static function store(NewUserRequest $req)
    {
        $user = User::make([
            'name' => $req->name,
            'discord_user_id' => $req->id,
        ]);

        try {
            return $user->save();
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public static function index()
    {
        try {
            return User::all();
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public static function show(string $discordUserId)
    {
        try {
            $foo = User::where('discord_user_id', $discordUserId)->first();
            dd($foo);
        } catch (Exception $e) {
            return $e;
        }
    }
}
