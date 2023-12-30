<?php

namespace App\Http\Controllers;

use App\Services\ApiDB\PlayerService;
use App\Http\Requests\NewPlayerRequest;

class PlayerController extends Controller {
    public static function index()
    {
        return PlayerService::index();
    }

    public static function store(NewPlayerRequest $user)
    {
        return PlayerService::store($user);
    }

    public static function show(string $discordUserId)
    {
        return PlayerService::show($discordUserId);
    }

    public static function destroy(string $discordUserId)
    {
        return PlayerService::destroy($discordUserId);
    }
}