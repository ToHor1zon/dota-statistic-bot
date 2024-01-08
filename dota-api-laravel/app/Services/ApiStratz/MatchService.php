<?php

namespace App\Services\ApiStratz;

use Exception;
use App\Services\QraphQLService;
use Illuminate\Support\Facades\Log;

class MatchService
{
    public static function getMatchData(string $matchId)
    {
        try {
            return QraphQLService::get('
                {
                    match(id: ' . $matchId . ' ) {
                        id
                        statsDateTime
                        durationSeconds
                        didRadiantWin
                        startDateTime
                        lobbyType
                        gameMode
                        averageRank
                        rank
                        radiantKills
                        direKills
                    }
                }
            ')['match'];
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
