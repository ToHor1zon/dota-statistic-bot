<?php

namespace App\Http\Controllers;

use App\Services\ApiDB\UserService;
use App\Http\Requests\NewUserRequest;

class UserController extends Controller {

    public static function index()
    {
        return UserService::index();
    }

    public static function store(NewUserRequest $user)
    {
        return UserService::store($user->all());
    }

    public static function show(string $discordUserId)
    {
        return UserService::show($discordUserId);
    }

    public static function destroy(string $discordUserId)
    {
        return UserService::destroy($discordUserId);
    }
}