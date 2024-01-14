<?php

namespace App\Http\Controllers;

use App\Services\ApiDB\SteamAccountService;
use App\Http\Requests\NewSteamAccountRequest;

class SteamAccountController extends Controller {
    public static function index()
    {
        return SteamAccountService::index();
    }

    public static function store(NewSteamAccountRequest $user)
    {
        return SteamAccountService::store($user->all());
    }

    public static function show(string $discordUserId)
    {
        return SteamAccountService::show($discordUserId);
    }

    public static function destroy(string $discordUserId)
    {
        return SteamAccountService::destroy($discordUserId);
    }
}