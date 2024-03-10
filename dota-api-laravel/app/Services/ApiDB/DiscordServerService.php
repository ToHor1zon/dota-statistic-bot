<?php

namespace App\Services\ApiDB;

use App\Models\User;
use App\Models\DiscordServer;
use App\Models\SteamAccount;
use App\Models\GameMatch;
use App\Models\Player;

use App\Enums\MatchPlayerLaneType;
use App\Enums\MatchPlayerPositionNames;


use App\Services\ApiStratz\SteamAccountService as StratzApiSteamAccountService;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests\Commands\InitRequest;
use App\Http\Requests\Commands\SignUpRequest;
use App\Services\ApiStratz\ItemService;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class DiscordServerService
{
    public static function signUp(SignUpRequest $req): JsonResponse
    {
        $isExistsUser = User::where('discord_id', $req->discordUserId)->exists();

        if (!$isExistsUser) {
            $user = UserService::store([
                'name' => $req->discordUserName,
                'discord_id' => $req->discordUserId
            ]);

            $server = DiscordServer::find($req->discordServerId);

            $user->discordServers()->attach($server);
        }

        $isExistsSteamAccount = SteamAccount::where('id', $req->steamAccountId)->exists();

        if ($isExistsSteamAccount) {
            // Если SteamAccount существует

            $steamAccount = SteamAccount::where('id', $req->steamAccountId)->with(['user'])->get();

            if($steamAccount->pluck('user')[0]->discord_id !== $req->discordUserId) {
                // Если SteamAccount существует и его discord_id отличаются discordUserId пользователя отправившего запрос

                return response()->json([
                    'message' => 'This SteamAccountId is already registered with another DiscordUserId'
                ], 409);
            } else {
                // Если SteamAccount существует и его discord_id уже есть в базе

                return response()->json([
                    'message' => 'You are already registered'
                ], 409);
            }
        } else {
            // Если SteamAccount не существует
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

    public static function getMatchImage(Request $req) {
        $data = self::generateMatchData($req->query('match-id'));

        foreach($data as $key => $value) {
            return response($data[$key]['html']);
        }
    }

    public static function getPlayerImage(Request $req) {
        $playerId = $req->query('player-id');

        if (!$playerId) {
            return response()->json([
                'message' => 'The "player-id" param is not provided'
            ], 404);
        }

        $player = Player::find($playerId)->load(['match', 'steamAccount']);

        $itemIds = [
            'item_0_img' => $player['item_0_id'],
            'item_1_img' => $player['item_1_id'],
            'item_2_img' => $player['item_2_id'],
            'item_3_img' => $player['item_3_id'],
            'item_4_img' => $player['item_4_id'],
            'item_5_img' => $player['item_5_id'],
            'neutral_0_img' => $player['neutral_0_id'],
            'backpack_0_img' => $player['backpack_0_id'],
            'backpack_1_img' => $player['backpack_1_id'],
            'backpack_2_img' => $player['backpack_2_id'],
        ];

        $itemImages = ItemService::getItemData($itemIds);

        $player->lane_name = MatchPlayerLaneType::fromValue((int) $player->lane)->description;
        $player->position_name = MatchPlayerPositionNames::fromValue((int) $player->position)->description;

        return view('player-image', [
            'player' => $player,
            'items' => $itemImages,
        ]);
    }

    private static function generateMatchData(int $matchId) {
        $discordServerData = [];

        $discordServers = DiscordServer::whereHas('users.steamAccounts.players', fn ($q) => $q->where('match_id', $matchId))->get();

        foreach ($discordServers as $discordServer) {
            $discordServerId = $discordServer->id;
            $discordChannelId = $discordServer->channel_id;

            $discordServerData["{$discordServerId}_{$discordChannelId}"] = [
                'match' => GameMatch::find($matchId),
                'players' => [
                    'radiant' => Player::where('match_id', $matchId)->where('is_radiant', true)->get()->sortBy('position'),
                    'dire' => Player::where('match_id', $matchId)->where('is_radiant', false)->get()->sortBy('position'),
                    'detailPlayers' => Player::where('match_id', $matchId)->whereHas('steamAccount.user.discordServers', fn ($q) => $q->where('discord_servers.id', $discordServerId))->get(),
                ]
            ];
        }

        foreach($discordServerData as $key => $data) {
            foreach($data['players']['detailPlayers'] as $player) {
                $itemIds = [
                    'item_0_img' => $player['item_0_id'],
                    'item_1_img' => $player['item_1_id'],
                    'item_2_img' => $player['item_2_id'],
                    'item_3_img' => $player['item_3_id'],
                    'item_4_img' => $player['item_4_id'],
                    'item_5_img' => $player['item_5_id'],
                    'neutral_0_img' => $player['neutral_0_id'],
                    'backpack_0_img' => $player['backpack_0_id'],
                    'backpack_1_img' => $player['backpack_1_id'],
                    'backpack_2_img' => $player['backpack_2_id'],
                ];
    
                $itemImages = ItemService::getItemData($itemIds);
                $player['items'] = $itemImages;
            }

            $discordServerData[$key]['html'] = view('finally-image', [
                'match' => $data['match'],
                'players' => $data['players'],
            ])->render();

            // Высота инфо о матче 467px, высота инфы о каждом игроке 184px, отступы между блоками 7px
            $discordServerData[$key]['size'] = [ 'width' => 915, 'height' => 467 + (184 + 7) * count($data['players']['detailPlayers'])];
        }

        return $discordServerData;
    }

    public static function sendFinallyImage(int $matchId) {
        $discordServerData = self::generateMatchData($matchId);

        $data = Response::json($discordServerData);

        Log::info('Generated data', ['data' => $data]);

        $url = config('api.dsb_img_gen_url');
        $port = config('api.dsb_img_gen_port');

        Http::post("http://{$url}:{$port}/generate-image", $data);
    }
}
