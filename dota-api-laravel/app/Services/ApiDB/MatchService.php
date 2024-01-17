<?php

namespace App\Services\ApiDB;

use App\Models\GameMatch;
use Carbon\Carbon;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Enums\LobbyType as LobbyTypeEnum;
use App\Enums\GameModeType as GameModeTypeEnum;

class MatchService
{
    public static function store(array $matchData)
    {
        try {
            $match = GameMatch::make([
                'id' => $matchData['id'],
                'did_radiant_win' => $matchData['didRadiantWin'],
                'duration' => $matchData['durationSeconds'],
                'start_date_time' => Carbon::createFromTimestamp($matchData['startDateTime']),
                'lobby_type_id' => LobbyTypeEnum::fromKey($matchData['lobbyType']),
                'game_mode_type_id' => GameModeTypeEnum::fromKey($matchData['gameMode']),
                'rank' => $matchData['rank'],
                'radiant_kills_count' => array_sum($matchData['radiantKills']),
                'dire_kills_count' => array_sum($matchData['direKills']),
            ]);

            $match->save();
            Log::info('Match with id: ' . $match->id . ' successfully created');
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
