<?php

namespace App\Services\ApiDB;

use App\Models\User;
use App\Models\DiscordServer;
use App\Models\SteamAccount;

use Illuminate\Http\JsonResponse;

use App\Services\ApiStratz\SteamAccountService as StratzApiSteamAccountService;

use App\Http\Requests\Commands\InitRequest;
use App\Http\Requests\Commands\SignUpRequest;
use Exception;

class DiscordServerService
{
    public static function signUp(SignUpRequest $req): JsonResponse
    {
        $isExistsUser = User::where('id', $req->discordUserId)->exists();
        $isExistsSteamAccount = SteamAccount::where('id', $req->steamAccountId)->exists();
        

        if (!$isExistsUser) {
            UserService::store([
                'name' => $req->discordUserName,
                'discord_id' => $req->discordUserId
            ]);
        }

        if ($isExistsSteamAccount) {
            $steamAccount = SteamAccount::where('id', $req->steamAccountId)->with(['user'])->get();

            if($steamAccount->pluck('user')[0]->discord_id !== $req->discordUserId) {
                return response()->json([
                    'message' => 'This SteamAccountId is already registered with another DiscordUserId'
                ], 409);
            } else {
                return response()->json([
                    'message' => 'You are already registered'
                ], 409);
            }
        } else {
            $steamAccountData = StratzApiSteamAccountService::getSteamAccountData($req->steamAccountId);

            if (!$steamAccountData) {
                return response()->json([
                    'message' => 'Invalid SteamAccountId'
                ], 409);
            }

            $steamAccount = SteamAccountService::store([
                'name' => $steamAccountData['name'],
                'id' => $steamAccountData['id'],
                'discord_user_id' => $req->discordUserId,
            ]);

            return response()->json([
                'message' => 'You are successfully registered'
            ], 201);
        }
    }

    public static function init(InitRequest $req) {
        
        $isExistsDiscordServer = DiscordServer::where('id', $req->discordServerId)->exists();

        if (!$isExistsDiscordServer) {
            DiscordServer::make([
                'id' => $req->discordServerId,
                'channel_id' => $req->discordChannelId,
            ])->save();

            return response()->json([
                'message' => 'DotaSpectatorBot is successfully registered on this server and will send messages in THIS channel only'
            ], 409);
        } else {
            $server = DiscordServer::where('id', $req->discordServerId)->first();

            if($server->channel_id !== $req->discordChannelId) {
                $server->update(['channel_id' => $req->discordChannelId]);

                return response()->json([
                    'message' => 'DotaSpectatorBot successfully re-init in this channel'
                ], 201);
            }

            return response()->json([
                'message' => 'DotaSpectatorBot already init on this server and this channel'
            ], 201);
        }
    }
}
