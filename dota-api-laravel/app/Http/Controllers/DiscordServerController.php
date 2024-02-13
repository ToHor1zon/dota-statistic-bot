<?php

namespace App\Http\Controllers;

use App\Services\ApiDB\DiscordServerService;
use App\Http\Requests\Commands\InitRequest;
use App\Http\Requests\Commands\SignUpRequest;
use Illuminate\Http\Request;

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

    public static function getMatchImage(Request $req)
    {
        return DiscordServerService::getMatchImage($req);
    }

    public static function getPlayerImage(Request $req)
    {
        return DiscordServerService::getPlayerImage($req);
    }
}
