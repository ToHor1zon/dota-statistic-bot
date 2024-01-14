<?php

namespace App\Services\ApiDB;

use App\Models\SteamAccount;

use Exception;

class SteamAccountService
{
    
    public static function isExists($id)
    {
        $steamAccount = SteamAccount::where('id', $id)->exists();
    }

    public static function store(array $reqParams) {
        $steamAccount = SteamAccount::make([
            'id' => $reqParams['id'],
            'name' => $reqParams['name'],
            'discord_user_id' => $reqParams['discord_user_id'],
        ]);

        try {
            $steamAccount->save();
            return response('Steam account ' . $reqParams['name'] . ' успешно создан', 201);
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public static function index() {
        return SteamAccount::with(['user'])->get();
    }
    
    public static function show(string $steamAccountId) {
        return SteamAccount::where('id', $steamAccountId)->firstOrFail();
    }
    
    public static function destroy(string $steamAccountId) {
        return SteamAccount::where('id', $steamAccountId)->firstOrFail()->delete();
    }
}
