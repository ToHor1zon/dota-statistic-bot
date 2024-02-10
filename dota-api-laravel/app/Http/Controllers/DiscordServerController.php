<?php

namespace App\Http\Controllers;

use App\Services\ApiDB\DiscordServerService;
use App\Http\Requests\Commands\InitRequest;
use App\Http\Requests\Commands\SignUpRequest;


class DiscordServerController extends Controller
{
    public static function init(InitRequest $req)
    {
        return DiscordServerService::init($req);
    }
    
    public static function signUp(SignUpRequest $req)
    {
        return DiscordServerService::signUp($req);
    }
}
