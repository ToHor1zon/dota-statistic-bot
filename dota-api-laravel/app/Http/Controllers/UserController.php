<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiDB\UserService;
use App\Http\Requests\NewUserRequest;
use App\Models\User;

class UserController extends Controller {
    public static function index()
    {
        return UserService::index();
    }

    public static function store(NewUserRequest $user)
    {
        return UserService::store($user);
    }

    public static function show(string $discordUserId)
    {
        return UserService::show($discordUserId);
    }
}