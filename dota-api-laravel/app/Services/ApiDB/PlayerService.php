<?php

namespace App\Services\ApiDB;


use App\Http\Requests\NewPlayerRequest;
use App\Models\Player;

use Exception;

class PlayerService
{
    public static function store(NewPlayerRequest $req) {
        $user = Player::make([
            'id' => $req->id,
            'name' => $req->name,
            'discord_user_id' => $req->discord_user_id,
        ]);

        try {
            $user->save();
            return response('Player ' . $req->name . ' успешно создан', 201);
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public static function index() {
        return Player::all();
    }
    
    public static function show(string $steamAccountId) {
        return Player::where('id', $steamAccountId)->firstOrFail();
    }
    
    public static function destroy(string $steamAccountId) {
        return Player::where('id', $steamAccountId)->firstOrFail()->delete();
    }

    public static function setPlayerData(string $steamAccountId)
    {
        //
    }

}
