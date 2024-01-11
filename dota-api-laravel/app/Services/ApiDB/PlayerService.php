<?php

namespace App\Services\ApiDB;

use App\Models\Player;

use Exception;

class PlayerService
{
    
    public static function isExists($id)
    {
        $player = Player::where('id', $id)->exists();
    }

    public static function store(array $reqParams) {
        $player = Player::make([
            'id' => $reqParams['id'],
            'name' => $reqParams['name'],
            'discord_user_id' => $reqParams['discord_user_id'],
        ]);

        try {
            $player->save();
            return response('Player ' . $reqParams['name'] . ' успешно создан', 201);
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public static function index() {
        return Player::with(['user'])->get();
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
